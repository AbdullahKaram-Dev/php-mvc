<?php
declare(strict_types=1);

use app\core\Controller;

class AuthController extends Controller
{

    public function index()
    {
        return $this->render('login');
    }

    public function register()
    {
        return $this->render('register');
    }

}