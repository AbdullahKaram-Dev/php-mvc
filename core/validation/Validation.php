<?php
declare(strict_types=1);

namespace app\core\validation;

use app\core\validation\ValidationStrategy;

class Validation
{
    public static function make(array $inputs, array $rules)
    {
        $errors = [];
        foreach ($rules as $inputName => $rule) {
            foreach ($rule as $key => $singleRule) {
                $class = 'app\core\validation\\' . ucwords($singleRule);
                $value = (isset($inputs[$inputName])) ? $inputs[$inputName] : '';
                $error = (new ValidationStrategy(new $class($value, $inputName)))->validate();

                if (!empty($error)) {
                    $errors[$inputName][$key] = $error;
                }
            }
        }

        return $errors;
    }

}
