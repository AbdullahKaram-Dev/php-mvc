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

    public function resolve()
    {
        $callback = $this->routes[$this->request->getMethod()][$this->request->getPath()] ?? false;

        if($callback === false){
            throw new RouteNotFoundException();
        } elseif (is_string($callback)) {
            return  $this->renderView($callback);
        }
        return call_user_func($callback);
    }

    public function renderView(string $view)
    {
        $viewPath = __DIR__.'/../views/'.$view.'.php';
        if (!file_exists($viewPath)){
            throw new ViewNotFoundException();
        }

        require $viewPath;
    }


}