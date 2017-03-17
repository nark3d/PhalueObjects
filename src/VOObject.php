<?php

namespace BestServedCold\PhalueObjects;

use BestServedCold\PhalueObjects\Exception\InvalidTypeException;

/**
 * Class VOObject
 *
 * @package BestServedCold\PhalueObjects\ValueObject
 */
class VOObject extends ValueObject
{
    /**
     * @var \ReflectionClass
     */
    protected $reflection;

    /**
     * ObjectValueObject constructor.
     *
     * @param $value
     */
    public function __construct($value)
    {
        if (! is_object($value)) {
            throw new InvalidTypeException($value, ['object']);
        }

        $this->reflection = new \ReflectionClass($this);
        parent::__construct($value);
    }

    /**
     * @return string
     */
    public function getType()
    {
        return get_class($this->getValue());
    }

    /**
     * @return string
     */
    public function getShortName()
    {
        return $this->reflection->getShortName();
    }
}
