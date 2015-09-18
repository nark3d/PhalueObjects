<?php namespace BestServedCold\PhalueObjects\Exception;

use BestServedCold\PhalueObjects\ExtendedArray\ExtendedArrayTrait;
use BestServedCold\PhalueObjects\Mathematical\Integer;

class InvalidTypeException extends \InvalidArgumentException
{
    use ExtendedArrayTrait;

    public function __construct($value, array $allowedTypes)
    {
        $this->message =
            'Argument [' . var_export($value, true) . '] is not a valid type.' .
            ' The allowed type(s) are [' . $this->getAllowedTypes($allowedTypes) .
            ']';
    }

    protected function getAllowedTypes($allowedTypes)
    {
        return $this->arrayToCommaString($allowedTypes, new Integer(1));
    }

    protected function getType($value)
    {
        return var_export($value, true);
    }
}
