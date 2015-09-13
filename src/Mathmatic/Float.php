<?php namespace PhalueObjects\Mathmatic;

use PhalueObjects\Exception\InvalidTypeException;
use PhalueObjects\Mathmatic;

class Float extends Mathmatic
{
    public function __construct($value)
    {
        if (! is_float($value)) {
            throw new InvalidTypeException($value, ['float']);
        }

        parent::__construct($value);
    }
}