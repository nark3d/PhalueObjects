<?php

namespace BestServedCold\PhalueObjects\Metric;

use BestServedCold\PhalueObjects\Mathematical\Operator\ArithmeticTrait;
use BestServedCold\PhalueObjects\VOFloat;

/**
 * Class MicroTime
 *
 * @package BestServedCold\PhalueObjects\Metric
 */
class MicroTime extends VOFloat implements MetricInterface
{
    use ArithmeticTrait;

    /**
     * @return static
     */
    public static function now()
    {
        return new static(microtime(true));
    }

    /**
     * @return string
     */
    public function __toString()
    {
        list($sec, $fine) = explode('.', $this->getValue());
        return  $sec.'.'.preg_replace('/0\./', '.', $fine);
    }
}
