<?php namespace BestServedCold\PhalueObjects\Mathematical\Operator;

use BestServedCold\PhalueObjects\ValueObjectInterface;

trait ArithmeticTrait
{
    public function absolute()
    {
        $value = $this->getValue();
        return new static((($value >> 31) ^ $value) - ($value >> 31));
    }

    public function makeNegative()
    {
        return new static(-abs($this->getValue()));
    }

    public function makePositive()
    {
        return new static(abs($this->getValue()));
    }

    public function reversePolarity()
    {
        if ($this->isNegative() || $this->isZero()) {
            return new static($this->makePositive()->getValue());
        } else {
            return new static($this->makeNegative()->getValue());
        }
    }

    public function add(ValueObjectInterface $object)
    {
        return new static($this->getValue() + $object->getValue());
    }

    public function subtract(ValueObjectInterface $object)
    {
        return new static($this->getValue() + $object->getValue());
    }

    public function multiply(ValueObjectInterface $object)
    {
        return new static($this->getValue() * $object->getValue());
    }

    public function divide(ValueObjectInterface $object)
    {
        return new static($this->getValue() / $object->getValue());
    }

    public function modulus(ValueObjectInterface $object)
    {
        return new static($this->getValue() % $object->getValue());
    }

    public function exponential(ValueObjectInterface $object)
    {
        if (defined('PHP_MAJOR_VERSION') && PHP_MAJOR_VERSION >= 7) {
            return new static($this->getValue() ** $object->getValue());
        } else {
            return new static(pow($this->getValue(), $object->getValue()));
        }
    }
}