<?php

namespace BestServedCold\PhalueObjects;

use BestServedCold\PhalueObjects\ValueObject\SingleValue;
use BestServedCold\PhalueObjects\Exception\InvalidTypeException;

class URI extends SingleValue
{
    protected $protocol;
    protected $host;

    public function __construct($value)
    {
        if (!filter_var($value, FILTER_VALIDATE_URL)) {
            throw new InvalidTypeException($value, [ 'url' ]);
        }
    }
}
