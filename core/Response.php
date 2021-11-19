<?php
declare(strict_types=1);

namespace app\core;

class Response
{
    public function setStatusCode(int $statusCode)
    {
        http_response_code($statusCode);
    }
}
