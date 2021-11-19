<?php
declare(strict_types=1);

namespace app\exceptions;

use Exception;

class ViewNotFoundException extends Exception
{
    protected $message = 'view not found';
}