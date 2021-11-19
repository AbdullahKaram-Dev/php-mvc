<?php

declare(strict_types=1);

namespace app\core;

class Application
{
    public Router $router;
    public Request $request;
    public static string $ROOT_PATH;

    public function __construct($ROOT_PATH)
    {
        self::$ROOT_PATH = $ROOT_PATH;
        $this->request = new Request();
        $this->router = new Router($this->request);
    }

    public function run()
    {
        try {
            echo $this->router->resolve();
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
    }
}
