<?php

declare(strict_types=1);

namespace app\core;

use app\exceptions\ViewNotFoundException;
use app\exceptions\RouteNotFoundException;
use app\exceptions\LayoutNotFoundException;
use Exception;

class Router
{
    protected array $routes = [];
    public Request $request;
    public Response $response;

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get(string $route, $callback)
    {
        $this->routes['get'][$route] = $callback;
    }

    public function post(string $route, $callback)
    {
        $this->routes['post'][$route] = $callback;
    }

    public function resolve()
    {
        $callback = $this->routes[$this->request->getMethod()][$this->request->getPath()] ?? false;
        if ($callback === false) {
            $this->response->setStatusCode(404);
            throw new RouteNotFoundException();
        } elseif (is_string($callback)) {
            return $this->renderView($callback);
            exit;
        }elseif (is_array($callback) && class_exists($callback[0])){
            $callback[0] = new $callback[0]();
            $callback[1] =  $callback[1];    
            return call_user_func($callback,$this->request);
        }
        
        throw new Exception("an error accourder with class router");
    }

    public function renderView(string $view,$params = [])
    {
        $layoutContent = $this->layoutContent();
        $viewPath = Application::$ROOT_PATH . '/views/' . $view . '.php';
        if (!file_exists($viewPath)) {
            $this->response->setStatusCode(404);
            throw new ViewNotFoundException();
        }

        $viewContent = $this->renderOnlyView($viewPath,$params);
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    protected function layoutContent()
    {
        $layoutPath = Application::$ROOT_PATH . '/views/layouts/main.php';
        if (!file_exists($layoutPath)) {
            $this->response->setStatusCode(404);
            throw new LayoutNotFoundException();
        }
        ob_start();
        include_once $layoutPath;
        return ob_get_clean();
    }

    protected function renderOnlyView($view,$params)
    {
        foreach($params as $key => $value)
        {
            $$key = $value;
        }

        ob_start();
        include_once $view;
        return ob_get_clean();
    }
}
