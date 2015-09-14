<?php namespace PhalueObjects\Mathematical;

use PhalueObjects\Exception\InvalidTypeException;
use PhalueObjects\Mathematical;

class Float extends Mathematical
{
    public function __construct($value)
    {
        if (!is_float($value)) {
            throw new InvalidTypeException($value, [ 'float' ]);
        }

        parent::__construct($value);
    }
}
