<?php

namespace app\core\validation;

use Symfony\Component\HttpFoundation\File\File;

class Image implements ValidationInterface
{
    protected $value;
    protected $name;
    protected $type;
    protected $tmp_name;
    protected $size;
    protected array $validExtensionsImage = ['image/jpeg', 'image/gif', 'image/png', 'image/jpg'];
    protected $allowedSize;

    public function __construct($value, $name)
    {
        $this->value = $value;
        $this->name = $name;
        $this->type = $this->value['type'];
        $this->tmp_name = $this->value['tmp_name'];
        $this->size = $this->value['size'];
        $this->allowedSize = (4 * 1000);
    }

    public function validate(): string
    {
        if (!in_array($this->type,$this->validExtensionsImage))
            return $this->name . " not valid image valid is (" . implode(',',$this->validExtensionsImage).")";
        return '';
    }
}