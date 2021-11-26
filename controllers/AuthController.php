<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Controller;
use app\core\Request;

class AuthController extends Controller
{

    public function index()
    {
        return $this->render('login');
    }

    public function register(Request $request)
    {
        if($request->IsMethod("GET"))
        {
            return $this->render('register');
        }

        return $this->render('register');
    }

}