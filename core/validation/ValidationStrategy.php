<?php
declare(strict_types=1);

namespace app\core\validation;

class ValidationStrategy
{
    protected ValidationInterface $validation;

    public function __construct($validation)
    {
        $this->validation = $validation;
    }

    public function validate():string
    {
        return $this->validation->validate();
    }

}