<?php

namespace BestServedCold\PhalueObjects;

use BestServedCold\PhalueObjects\Mathematical\Operator\ArithmeticTrait;

abstract class Metric extends ValueObject
{
    use ArithmeticTrait;

    public function __toString()
    {
        return is_array($this->getValue()) ? implode(',', $this->getValue()) : (string) $this->getValue();
    }
}
