<?php

namespace BestServedCold\PhalueObjects;

use InvalidArgumentException;
use BestServedCold\PhalueObjects\Contract\ValueObject as ValueObjectInterface;

/**
 * Class ValueObject
 *
 * @package   BestServedCold\PhalueObjects
 * @author    Adam Lewis <adam.lewis@bestservedcold.com>
 * @copyright Copyright (c) 2015 Best Served Cold Media Limited
 * @license      http://http://opensource.org/licenses/GPL-3.0 GPL License
 * @link      http://bestservedcold.com
 * @since      0.0.1-alpha
 * @version   0.0.2-alpha
 */
class ValueObject implements ValueObjectInterface
{
    /**
     * @var mixed
     */
    protected $value;

    /**
     * @var string
     */
    protected $type;

    /**
     * Class Constructor
     */
    public function __construct($value)
    {
        $this->value = $value;
        $this->type  = gettype($value);
    }

    /**
     * @param  $field
     * @param  $value
     * @throws \RuntimeException
     * @return void
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
    public function __toString()
    {
        return (string) $this->getValue();
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
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
     * @param $string
     * @return static
     */
    public static function fromString($string)
    {
        return new static((string) $string);
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param  ValueObject $object
     * @return bool
     */
    public function equals(ValueObject $object)
    {
        return $this->value === $object->value;
    }

    /**
     * @param  ValueObject $object
     * @return array|mixed
     */
    public function diff(ValueObject $object)
    {
        switch ($this->getType()) {
            case 'boolean':
            case 'double':
            case 'integer':
                return new static($this->getValue() - $object->getValue());
            case 'array':
                return new static(
                    $object->getType() === 'array'
                        ? array_diff_assoc($this->getValue(), $object->getValue())
                        : $this->getValue()
                );
            case 'string':
                return new static(
                    str_replace($object->getValue(), '', $this->getValue())
                );
            case 'NULL':
                return new static($object->getValue());
            case 'object':
            case 'resource':
                return null;
            case 'unknown type':
            default:
                throw new InvalidArgumentException('Cannot diff type [' . $this->type . '].');
        }
    }

    public function count()
    {
        switch ($this->getType()) {
            case 'boolean':
            case 'double':
            case 'integer':
                return $this->getValue();
            case 'array':
            case 'NULL':
                return count($this->getValue());
            case 'object':
            case 'resource':
                return null;
            case 'string':
                return strlen($this->getValue());
            case 'unknown type':
            default:
                throw new InvalidArgumentException('Cannot count type [' . $this->type . '].');
        }
    }
}
