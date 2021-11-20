<?php

declare(strict_types=1);

namespace app\controllers;

use app\core\Controller;

class UserController extends Controller 
{
    public function index()
    {
        return $this->render('users');
    }

    public function create()
    {
        return $this->render('create');
    }
}
