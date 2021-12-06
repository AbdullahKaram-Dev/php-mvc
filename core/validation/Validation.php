<?php

declare(strict_types=1);

namespace app\core\validation;

use app\core\validation\ValidationStrategy;

class Validation
{
    public static function make(array $inputs, array $rules):array
    {
        $errors = [];


            foreach ($inputs as $inputName => $inputValue) {


                foreach ($rules[$inputName] as $key => $rule) {

                    print_r($key);

                    // dd($key);

                    //     $class = 'app\core\validation\\' . ucwords($rule);


                    //     $error = (new ValidationStrategy(new $class($inputValue, $inputName)))->validate();

                    //     if (!empty($error)) {
                    //         dd($inputName[$key]);
                    //         $errors[$inputName][$key] = $error;
                    //     }
                    // } 
                }
        
                dd('here');

        
            }

            return $errors;
    }

}
