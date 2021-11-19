<?php

declare(strict_types=1);

namespace app\core;
use Exception;

class Application
{
    public Router $router;
    public Request $request;
    public static Application $application;
    public Response $response;
    public static string $ROOT_PATH;

    public function __construct($ROOT_PATH)
    {
        self::$ROOT_PATH = $ROOT_PATH;
        $this->request = new Request();
        self::$application = $this;
        $this->response = new Response();
        $this->router = new Router($this->request,$this->response);
    }

    public function run()
    {
        try {
            echo $this->router->resolve();
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }
}
