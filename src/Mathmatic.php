<?php namespace PhalueObjects;

class Mathmatic extends AbstractObject
{
    protected $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function native()
    {
        return $this->value;
    }

    public function makeNegative()
    {
        $this->value = -abs($this->value);
    }

    public function makePositive()
    {
        $this->value = abs($this->value);
    }

    public function isNegative()
    {
        return $this->getValue() < 0;
    }

    public function isPositive()
    {
        return $this->getValue() > 0;
    }

    public function isZero()
    {
        return $this->getValue() === (int) 0;
    }

    public function isGreaterThan(Mathmatic $number)
    {
        return $this->getValue() > $number->getValue();
    }

    public function isLessThan(Mathmatic $number)
    {
        return $this->getValue() < $number->getValue();
    }

    public function isGreaterThanOrEqualTo(Mathmatic $number)
    {
        return $this->getValue() >= $number->getValue();
    }

    public function isLessThanOrEqualTo(Mathmatic $number)
    {
        return $this->getValue() <= $number->getValue();
    }

    public function reversePolarity()
    {
        if ($this->isNegative() || $this->isZero()) {
            $this->makePositive();
        } else {
            $this->makeNegative();
        }
    }
}
