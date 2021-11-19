<?php

namespace app\exceptions;

use Exception;

class LayoutNotFoundException extends Exception
{
    protected $message = 'layout not found';

}