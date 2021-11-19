<?php
declare(strict_types=1);

namespace app\core;

class Router
{
    protected array $routes = [];
    public Request $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function get(string $route, callable $callback)
    {
        $this->routes['get'][$route] = $callback;
    }

    public function post(string $route, callable $callback)
    {
        $this->routes['post'][$route] = $callback;
    }

    public function resolve()
    {
        var_dump($this->request->getPath());
    }


}