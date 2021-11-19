<?php

declare(strict_types=1);

namespace app\controllers;

class UserController
{
    public function index()
    {
        return 'user index';
    }

    public function create()
    {
        return 'create new user';
    }

    public function store()
    {
        return 'user store';
    }
}
