<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\validation\Validation;
use app\core\Controller;
use app\core\Request;

class ContactController extends Controller
{
    public function create()
    { 
        return $this->render('create_contact');
    }

    public function store(Request $request)
    {
        $Validation = Validation::make($request->only(['email','password']),[
            'email' => ['required'],
            'password' => ['required']
        ]);

        dd($Validation);
    }
}