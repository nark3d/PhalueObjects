<?php

namespace BestServedCold\PhalueObjects\Mathematical\Operator;

trait TypeTrait
{
    public abstract function getValue();

    public function isPositive()
    {
        return $this->getValue() > 0;
    }

    public function isNegative()
    {
        return $this->getValue() < 0;
    }

    public function isZero()
    {
        return $this->getValue() === 0;
    }

    public function isNegativeOrZero()
    {
        return $this->isNegative() || $this->isZero();
    }

    public function isPositiveOrZero()
    {
        return $this->isPositive() || $this->isZero();
    }
}
