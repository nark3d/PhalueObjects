<?php namespace BestServedCold\PhalueObjects\Mathematical;

use BestServedCold\PhalueObjects\Exception\InvalidTypeException;
use BestServedCold\PhalueObjects\Mathematical;

 class Integer extends Mathematical
{
    public function __construct($value)
    {
        if (!filter_var($value, FILTER_VALIDATE_INT)) {
            throw new InvalidTypeException($value, [ 'integer' ]);
        }

        parent::__construct($value);
    }
}
