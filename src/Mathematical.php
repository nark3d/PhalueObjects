<?php namespace BestServedCold\PhalueObjects;

use BestServedCold\PhalueObjects\AbstractObject\SingleValueObject;

class Mathematical extends SingleValueObject
{
     public function makeNegative()
    {
        $this->value = -abs($this->value);
        return $this;
    }

    public function makePositive()
    {
        $this->value = abs($this->value);
        return $this;
    }

    public function reversePolarity()
    {
        if ($this->isNegative() || $this->isZero()) {
            $this->makePositive();
        } else {
            $this->makeNegative();
        }
        return $this;
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

    public function isGreaterThan(Mathematical $number)
    {
        return $this->getValue() > $number->getValue();
    }

    public function isLessThan(Mathematical $number)
    {
        return $this->getValue() < $number->getValue();
    }

    public function isGreaterThanOrEqualTo(Mathematical $number)
    {
        return $this->getValue() >= $number->getValue();
    }

    public function isLessThanOrEqualTo(Mathematical $number)
    {
        return $this->getValue() <= $number->getValue();
    }
}

