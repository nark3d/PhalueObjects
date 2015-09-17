<?php namespace BestServedCold\PhalueObjects\Mathematical;

use BestServedCold\PhalueObjects\Exception\InvalidTypeException;
use BestServedCold\PhalueObjects\Mathematical;

class Float extends Mathematical
{
    public function __construct($value)
    {
        if (! filter_var($value, FILTER_VALIDATE_FLOAT)) {
            throw new InvalidTypeException($value, [ 'float' ]);
        }

        parent::__construct($value);
    }
}
