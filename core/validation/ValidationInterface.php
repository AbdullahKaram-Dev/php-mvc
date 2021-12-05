<?php
declare(strict_types=1);

namespace app\core\Validation;

interface ValidationInterface
{
    public function __construct($value,$name);

    public function validate(): string;
}