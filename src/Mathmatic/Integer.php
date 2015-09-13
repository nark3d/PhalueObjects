<?php namespace PhalueObjects\Mathmatic;

use PhalueObjects\Exception\InvalidTypeException;
use PhalueObjects\Mathmatic;

final class Integer extends Mathmatic
{
    public function __construct($value)
    {
        if (! is_integer($value)) {
            throw new InvalidTypeException($value, ['integer']);
        }

        parent::__construct($value);
    }
}