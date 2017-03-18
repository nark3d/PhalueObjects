<?php namespace BestServedCold\PhalueObjects\Internet;

use BestServedCold\PhalueObjects\ValueObject;
use BestServedCold\PhalueObjects\Exception\InvalidTypeException;

/**
 * Class Email
 *
 * @package BestServedCold\PhalueObjects\Internet
 */
final class Email extends ValueObject
{
    /**
     * Email constructor.
     *
     * @param $value
     */
    public function __construct($value)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidTypeException($value, [ 'email' ]);
        }

        parent::__construct($value);
    }
}
