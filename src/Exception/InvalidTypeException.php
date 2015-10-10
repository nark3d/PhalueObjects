<?php

namespace BestServedCold\PhalueObjects\Exception;

use BestServedCold\PhalueObjects\ExtendedArray\ExtendedArrayTrait;
use BestServedCold\PhalueObjects\Mathematical\Integer;

class InvalidTypeException extends \InvalidArgumentException
{
    use ExtendedArrayTrait;

    public function __construct($value, array $allowedTypes)
    {
        $this->message =
            '[PhalueObjects] Argument [' . $value . '] of type [' . gettype($value) .
            '] is not a valid type.' . ' The allowed type(s) are [' .
            $this->getAllowedTypes($allowedTypes) . ']';
    }

    protected function getAllowedTypes($allowedTypes)
    {
        return $this->arrayToCommaString($allowedTypes, new Integer(1));
    }
}
