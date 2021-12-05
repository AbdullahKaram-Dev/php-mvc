<?php
declare(strict_types=1);

namespace app\core\Validation;

class ValidationStrategy
{
    protected ValidationInterface $validation;

    public function __construct($validation)
    {
        $this->validation = $validation;
    }

    public function validate()
    {
        return $this->validation->validate();
    }

}