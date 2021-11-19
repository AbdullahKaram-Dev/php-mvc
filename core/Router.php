<?php
declare(strict_types=1);

namespace app\core;

use app\exceptions\ViewNotFoundException;
use app\exceptions\RouteNotFoundException;

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

    public function renderView(string $view)
    {
        $viewPath = __DIR__.'/../views/'.$view.'.php';
        if (!file_exists($viewPath)){
            http_response_code(404);
            throw new ViewNotFoundException();
        }

        require $viewPath;
    }

    public function resolve()
    {
        $callback = $this->routes[$this->request->getMethod()][$this->request->getPath()] ?? false;

        if($callback === false){
            http_response_code(404);
            throw new RouteNotFoundException();

        } elseif (is_string($callback)) {
              $this->renderView($callback);
              exit;
        }

        return call_user_func($callback);
    }

   
}