<?php
declare(strict_types=1);

namespace app\core;

use app\exceptions\ViewNotFoundException;
use app\exceptions\RouteNotFoundException;
use app\exceptions\LayoutNotFoundException;

class Router
{
    protected array $routes = [];
    public Request $request;

    public function __construct($request)
    {
        $this->request = $request;
    }
   
    public function get(string $route,$callback)
    {
        $this->routes['get'][$route] = $callback;
    }

    public function post(string $route,$callback)
    {
        $this->routes['post'][$route] = $callback;
    }

    public function resolve()
    {
        $callback = $this->routes[$this->request->getMethod()][$this->request->getPath()] ?? false;
        if($callback === false){
            Application::$application->response->setStatusCode(404);
            throw new RouteNotFoundException();

        } elseif (is_string($callback)) {
              return $this->renderView($callback);
              exit;
        }

        return call_user_func($callback);
    }

    public function renderView(string $view)
    {
        $layoutContent = $this->layoutContent(); 
        $viewPath = Application::$ROOT_PATH.'/views/'.$view.'.php';
        if (!file_exists($viewPath)){
            Application::$application->response->setStatusCode(404);
            throw new ViewNotFoundException();
        }

        $viewContent = $this->renderOnlyView($viewPath);
        return str_replace('{{content}}',$viewContent,$layoutContent);
    }

    protected function layoutContent()
    {
        $layoutPath = Application::$ROOT_PATH.'/views/layouts/main.php';
        if (!file_exists($layoutPath)){
            Application::$application->response->setStatusCode(404);
            throw new LayoutNotFoundException();
        }
        ob_start();
        include_once $layoutPath;
        return ob_get_clean();
    }

    protected function renderOnlyView($view)
    {
        ob_start();
        include_once $view;
        return ob_get_clean();
    }

   
}