<?php namespace BestServedCold\PhalueObjects\Internet;

use BestServedCold\PhalueObjects\Exception\InvalidRangeTypeException;
use BestServedCold\PhalueObjects\ValueObject;
use BestServedCold\PhalueObjects\Exception\InvalidTypeException;

final class Email extends ValueObject
{
    public function __construct($value)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidTypeException($value, [ 'email' ]);
        }

        parent::__construct($value);
    }

    public function equals(Email $address)
    {
        return strtolower((string) $this) === strtolower((string) $address);
    }
}
