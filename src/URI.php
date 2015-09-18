<?php namespace PhalueObjects;

use BestServedCold\PhalueObjects\AbstractObject\SingleValueObject;
use BestServedCold\PhalueObjects\Exception\InvalidTypeException;

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