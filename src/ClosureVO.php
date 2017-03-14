<?php

namespace BestServedCold\PhalueObjects;

use BestServedCold\PhalueObjects\Exception\InvalidTypeException;

/**
 * Class ClosureVO
 *
 * @package BestServedCold\PhalueObjects\ValueObject
 */
class ClosureVO extends ValueObject
{
    /**
     * ClosureVO constructor.
     *
     * @param \Closure $value
     */
    public function __construct(\Closure $value)
    {
        parent::__construct($value);
    }
}
