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
            dd('get');
        }elseif($request->IsMethod("post")){

             dd('post');   
        }
        
        return $this->render('register');
    }

}