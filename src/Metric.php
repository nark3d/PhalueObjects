<?php

namespace BestServedCold\PhalueObjects;

use BestServedCold\PhalueObjects\Mathematical\Operator\ArithmeticTrait;

/**
 * Class Metric
 *
 * @package BestServedCold\PhalueObjects
 */
abstract class Metric extends VOArray
{
    use ArithmeticTrait;

    /**
     * @return string
     */
    public function __toString()
    {
        return is_array($this->getValue()) ? implode(',', $this->getValue()) : (string) $this->getValue();
    }
}
