<?php namespace BestServedCold\PhalueObjects;

use BestServedCold\PhalueObjects\Exception\InvalidRangeTypeException;
use BestServedCold\PhalueObjects\Mathematical\Range;
use BestServedCold\PhalueObjects\ValueObject\SingleValue;

class Mathematical extends SingleValue
{
    protected $maximum = false;
    protected $minimum = false;

    public function __construct($value)
    {
        if (
            $this->minimum &&
            $this->maximum &&
            !(new Range($this->maximum, $this->minimum))
                ->inRange(new Mathematical($value)))
        {

            throw new InvalidRangeTypeException(
                $value,
                [ 'Mathematical' ],
                $this->minimum,
                $this->maximum
            );
        }

        parent::__construct($value);
    }

    public function makeNegative()
    {
        $this->value = -abs($this->getValue());
        return $this;
    }

    public function makePositive()
    {
        $this->value = abs($this->getValue());
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
