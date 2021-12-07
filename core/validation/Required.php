<?php
declare(strict_types=1);

namespace app\core\validation;

use app\core\validation\ValidationInterface;

class Required implements ValidationInterface
{
    protected  $value;
    protected  $name;

    public function __construct($value,$name)
    {
        $this->value = $value;
        $this->name  = $name;
    }

    public function validate(): string
    {
        if(empty($this->value))
            return $this->name . ' is required';

        return '';    
    }

}