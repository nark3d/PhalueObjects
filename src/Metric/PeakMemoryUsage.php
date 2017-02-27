<?php

namespace BestServedCold\PhalueObjects\Metric;

use BestServedCold\PhalueObjects\Format\Byte\Binary;
use BestServedCold\PhalueObjects\Mathematical\Operator\ArithmeticTrait;
use BestServedCold\PhalueObjects\Metric;

/**
 * Class PeakMemoryUsage
 *
 * @package BestServedCold\PhalueObjects\Metric
 */
class PeakMemoryUsage extends Metric implements MetricInterface
{
    use ArithmeticTrait;

    /**
     * @return static
     */
    public static function now()
    {
        return new static(memory_get_peak_usage());
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) Binary::fromBytes($this->getValue());
    }
}
