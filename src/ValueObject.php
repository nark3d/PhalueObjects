<?php

namespace BestServedCold\PhalueObjects;

/**
 * Class ValueObject
 *
 * @package   BestServedCold\PhalueObjects
 * @author    Adam Lewis <adam.lewis@bestservedcold.com>
 * @copyright Copyright (c) 2015 Best Served Cold Media Limited
 * @license	  http://http://opensource.org/licenses/GPL-3.0 GPL License
 * @link	  http://bestservedcold.com
 * @since	  0.0.1-alpha
 * @version   0.0.2-alpha
 */
class ValueObject implements ValueObjectInterface
{
    /**
     * @var \ReflectionClass
     */
    protected $reflection;

    /**
     * @var mixed
     */
    protected $value;

    /**
     * Class Constructor
     */
    public function __construct($value)
    {
        $this->value = $value;
        $this->reflection = new \ReflectionClass($this);
    }

    /**
     * @return string
     */
    public function getShortName()
    {
        return $this->reflection->getShortName();
    }

    /**
     * @param $field
     * @param $value
     */
    public function __set($field, $value)
    {
        throw new \RuntimeException(
            "You cannot set a value of a Value Object, that's the whole point!"
        );
    }

    /**
     * @return string
     */
    public function hash()
    {
        return spl_object_hash($this);
    }

    /**
     * @param  $object
     * @return mixed
     */
    public function cloneObject($object)
    {
        return clone($object);
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->value;
    }

    /**
     * @param  ValueObject $object
     * @return bool
     */
    public function equals(ValueObject $object)
    {
        return $this->value === $object->value;
    }
}
