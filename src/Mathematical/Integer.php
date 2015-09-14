<?php namespace PhalueObjects\Mathematical;

use PhalueObjects\Exception\InvalidTypeException;
use PhalueObjects\Mathematical;

final class Integer extends Mathematical
{
    public function __construct($value)
    {
        if (!is_integer($value)) {
            throw new InvalidTypeException($value, [ 'integer' ]);
        }

        parent::__construct($value);
    }
}
