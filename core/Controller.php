<?php
declare(strict_types=1);

namespace app\core;

use app\core\Application;

class Controller
{
    public static function render($view,$params = [])
    {
        return Application::$application->router->renderView($view,$params);
    }
}