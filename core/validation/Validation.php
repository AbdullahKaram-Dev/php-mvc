<?php
declare(strict_types=1);

namespace app\core\validation;
use app\core\validation\ValidationStrategy;

class Validation
{
    protected static array $errors = [];

    public static function make(array $inputs,array $rules)
    {
        foreach($inputs as $inputName => $inputValue)
        {
            foreach($rules[$inputName] as $key => $rule)
            {
                $class = 'app\core\validation\\'.ucwords($rule);
              
                $errors = (new ValidationStrategy(new $class($inputValue,$inputName)))->validate();
                if(!empty($errors)){
                 
                    static::$errors[$inputName][$key] = $errors;
                }
            }   
        }

        return static::$errors;

    }


}