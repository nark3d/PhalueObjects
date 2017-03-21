<?php

namespace BestServedCold\PhalueObjects;

use BestServedCold\PhalueObjects\Exception\InvalidTypeException;

/**
 * Class VOResource
 *
 * @package BestServedCold\PhalueObjects
 */
class VOResource extends ValueObject
{
    /**
     * VOResource constructor.
     *
     * @param $value
     */
    public function __construct($value)
    {
        if (!is_resource($value)) {
            throw new InvalidTypeException($value, [ 'object' ]);
        }

        parent::__construct($value);
    }
}
