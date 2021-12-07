<?php

namespace app\core\validation;


class Text implements ValidationInterface
{
    protected $value;
    protected $name;

    public function __construct($value, $name)
    {
        $this->value = $value;
        $this->name = $name;
    }

    public function validate(): string
    {
        if (!is_string($this->value))
            return $this->name . " not string";

        return '';
    }
}