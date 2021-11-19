<?php
declare(strict_types=1);

namespace app\core;


class Request
{

    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path,'?');
        return explode('?',$_SERVER['REQUEST_URI'])[0];
    }

    public function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

}