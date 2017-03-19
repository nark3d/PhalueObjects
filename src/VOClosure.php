<?php

namespace BestServedCold\PhalueObjects;

/**
 * Class VOClosure
 *
 * @package BestServedCold\PhalueObjects\ValueObject
 */
class VOClosure extends ValueObject
{
    /**
     * VOClosure constructor.
     *
     * @param \Closure $value
     */
    public function __construct(\Closure $value)
    {
        parent::__construct($value);
    }
}
