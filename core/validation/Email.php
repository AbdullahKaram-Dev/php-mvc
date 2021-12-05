<?php
declare(strict_types=1);

namespace app\core\validation;

use app\core\validation\ValidationInterface;


class Email implements ValidationInterface
{
    protected $value;
    protected $name;

    public function __construct($value,$name)
    {
        $this->value = $value;
        $this->name  = $name; 
    }

    public function validate():string
    {
       if(!filter_var($this->value,FILTER_VALIDATE_EMAIL))
            return $this->name . " not valid email";
        return '';    
    }
}