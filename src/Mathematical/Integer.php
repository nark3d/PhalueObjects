<?php namespace BestServedCold\PhalueObjects\Mathematical;

use BestServedCold\PhalueObjects\Exception\InvalidTypeException;
use BestServedCold\PhalueObjects\Mathematical;

 class Integer extends Mathematical
{
    public function __construct($value)
    {
        if (!is_int($value)) {
            throw new InvalidTypeException($value, [ 'integer' ]);
        }

        parent::__construct($value);
    }
}
