<?php namespace PhalueObjects\Exception;

use PhalueObjects\ExtendedArray\ExtendedArrayTrait;
use PhalueObjects\Number\Integer;

class InvalidTypeException extends \InvalidArgumentException
{
    use ExtendedArrayTrait;

    public function __construct($value, array $allowedTypes)
    {
        $this->message = sprintf(
            'Argument "%s" is an invalid type. Allowed types for argument are "%s".',
            $value,
            $this->arrayToCommaString($allowedTypes, new Integer(1))
        );
    }
}