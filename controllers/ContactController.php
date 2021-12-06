<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\core\validation\Validation;

class ContactController extends Controller
{
    public function create()
    { 
        return $this->render('create_contact');
    }

    public function store(Request $request)
    {
        //dd($request->only(['email','password']));
        
        $Validation = Validation::make($request->only(['email','password']),[
            'email' => ['required'],
            'password' => ['required']
        ]);

        dd($Validation);
    }
}