<?php namespace PhalueObjects;

use PhalueObjects\AbstractObject\SingleValueObject;
use PhalueObjects\Exception\InvalidTypeException;

class ExtendedArray extends SingleValueObject
{
    public function __construct($value)
    {
        if (!is_array($value)) {
            throw new InvalidTypeException($value, [ 'array' ]);
        }

        parent::__construct($value);
    }
}
