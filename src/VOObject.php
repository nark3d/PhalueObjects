<?php

namespace BestServedCold\PhalueObjects;

use BestServedCold\PhalueObjects\Exception\InvalidTypeException;

/**
 * Class VOObject
 *
 * @package BestServedCold\PhalueObjects\ValueObject
 */
class VOObject extends ValueObject implements \Countable
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
        if (!is_object($value)) {
            throw new InvalidTypeException($value, [ 'object' ]);
        }

        $this->reflection = new \ReflectionClass($value);
        parent::__construct($value);
    }

    /**
     * @return object
     */
    public function getValue()
    {
        return (object) parent::getValue();
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

    /**
     * @return integer
     * @throws \Exception
     */
    public function count()
    {
        if (! method_exists($this->getValue(), 'count')) {
            throw new \Exception('[' . $this->getShortName() . '] does not have a count method.');
        }

        return $this->getValue()->count();
    }
}
