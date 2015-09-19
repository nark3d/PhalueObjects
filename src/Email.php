<?php namespace BestServedCold\PhalueObjects;

use BestServedCold\PhalueObjects\Exception\InvalidTypeException;
use BestServedCold\PhalueObjects\ValueObject\SingleValue;

class Email extends SingleValue
{
    protected $domain;
    protected $userName;

    public function __construct($value)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidTypeException($value, [ 'email' ]);
        }

        parent::__construct($value);
    }

    public function getDomain()
    {

    }

    public function emailGinny(Email $bob)
    {

    }
}
