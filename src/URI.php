<?php namespace PhalueObjects;

use PhalueObjects\AbstractObject\SingleValueObject;
use PhalueObjects\Exception\InvalidTypeException;

class URI extends SingleValueObject
{
    protected $protocol;
    protected $host;

    public function __construct($value)
    {
        if (!filter_var($value, FILTER_VALIDATE_URL)) {
            throw new InvalidTypeException($value, ['url']);
        }
    }
}