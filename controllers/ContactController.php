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
        // $data = ['email' => '','name' => ''];
        // $rules = ['email' => ['required','email'],'name' => ['required']];

        dd($request->only(['email','password']));


        $Validation = Validation::make($data,$rules);
        dd($Validation);


        $request->dd();
    }
}