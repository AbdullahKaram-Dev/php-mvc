<?php
declare(strict_types=1);

namespace app\exceptions;

use Exception;

class RouteNotFoundException extends Exception
{
    protected $message = 'route not found';
}