<?php

namespace BestServedCold\PhalueObjects\Metric;

use BestServedCold\PhalueObjects\Format\Byte\Binary;
use BestServedCold\PhalueObjects\Mathematical\Operator\ArithmeticTrait;
use BestServedCold\PhalueObjects\VOFloat;

/**
 * Class MemoryUsage
 *
 * @package BestServedCold\PhalueObjects\Metric
 */
class MemoryUsage extends VOFloat implements MetricInterface
{
    use ArithmeticTrait;

    /**
     * @return static
     */
    public static function now()
    {
        return new static(memory_get_usage());
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) Binary::fromFloat($this->getValue());
    }
}
