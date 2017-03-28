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

    /**
     * @return \Closure
     */
    public function getValue()
    {
        return parent::getValue();
    }

    /**
     * @param  \Closure $closure
     * @return static
     */
    public static function fromClosure(\Closure $closure)
    {
        return new static($closure);
    }
}
