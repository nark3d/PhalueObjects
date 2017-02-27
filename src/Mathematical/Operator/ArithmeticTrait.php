<?php

namespace BestServedCold\PhalueObjects\Mathematical\Operator;

use BestServedCold\PhalueObjects\ValueObjectInterface;

/**
 * Class ArithmeticTrait
 *
 * @package   BestServedCold\PhalueObjects\Mathematical\Operator
 * @author    Adam Lewis <adam.lewis@bestservedcold.com>
 * @copyright Copyright (c) 2015 Best Served Cold Media Limited
 * @license	  http://http://opensource.org/licenses/GPL-3.0 GPL License
 * @link	  http://bestservedcold.com
 * @since	  0.0.1-alpha
 * @version   0.0.2-alpha
 */
trait ArithmeticTrait
{
    /**
     * @return mixed
     */
    public abstract function getValue();

    /**
     * @return static
     */
    public function absolute()
    {
        return new static(abs($this->getValue()));
    }

    /**
     * @return static
     */
    public function makeNegative()
    {
        return new static(-$this->absolute($this->getValue())->getValue());
    }

    /**
     * @return static
     */
    public function makePositive()
    {
        return new static($this->absolute($this->getValue())->getValue());
    }

    /**
     * @return static
     */
    public function reversePolarity()
    {
        if ($this->isNegative() || $this->isZero()) {
            return new static($this->makePositive()->getValue());
        } else {
            return new static($this->makeNegative()->getValue());
        }
    }

    /**
     * @param  ValueObjectInterface $object
     * @return static
     */
    public function add(ValueObjectInterface $object)
    {
        return new static($this->getValue() + $object->getValue());
    }

    /**
     * @param  ValueObjectInterface $object
     * @return static
     */
    public function subtract(ValueObjectInterface $object)
    {
        return new static($this->getValue() - $object->getValue());
    }

    /**
     * @param  ValueObjectInterface $object
     * @return static
     */
    public function multiply(ValueObjectInterface $object)
    {
        return new static($this->getValue() * $object->getValue());
    }

    /**
     * @param  ValueObjectInterface $object
     * @return static
     */
    public function divide(ValueObjectInterface $object)
    {
        return new static($this->getValue() / $object->getValue());
    }

    /**
     * @param  ValueObjectInterface $object
     * @return static
     */
    public function modulus(ValueObjectInterface $object)
    {
        return new static($this->getValue() % $object->getValue());
    }

    /**
     * @param  ValueObjectInterface $object
     * @return static
     */
    public function exponentiation(ValueObjectInterface $object)
    {
        return new static(pow($this->getValue(), $object->getValue()));
    }
}
