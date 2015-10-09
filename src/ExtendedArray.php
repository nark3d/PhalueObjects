<?php

namespace BestServedCold\PhalueObjects;

use BestServedCold\PhalueObjects\ValueObject\SingleValue;
use BestServedCold\PhalueObjects\Exception\InvalidTypeException;

class ExtendedArray extends SingleValue
{
    public function __construct($value)
    {
        if (!is_array($value)) {
            throw new InvalidTypeException($value, [ 'array' ]);
        }

        parent::__construct($value);
    }
}
