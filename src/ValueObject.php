<?php

namespace BestServedCold\PhalueObjects;

use BestServedCold\PhalueObjects\Contract\ValueObject as ValueObjectInterface;

/**
 * Class ValueObject
 *
 * @package   BestServedCold\PhalueObjects
 * @author    Adam Lewis <adam.lewis@bestservedcold.com>
 * @copyright Copyright (c) 2015 Best Served Cold Media Limited
 * @license   http://http://opensource.org/licenses/GPL-3.0 GPL License
 * @link      http://bestservedcold.com
 * @since     0.0.1-alpha
 * @version   1.0.0
 */
abstract class ValueObject implements ValueObjectInterface
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
     * ValueObject constructor.
     *
     * @param $value
     */
    public function __construct($value)
    {
        $this->value = $value;
        $this->type  = gettype($value);
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
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
        return method_exists($this, 'toString') ? $this->toString() : (string) $this->getValue();
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
     * @param  ValueObjectInterface $object
     * @return bool
     */
    public function equals(ValueObjectInterface $object)
    {
        return $this->getValue() === $object->getValue();
    }

    /**
     * @inheritdoc
     */
    public function __destruct()
    {
        $this->value = null;
    }
}
