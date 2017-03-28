<?php

namespace BestServedCold\PhalueObjects\Metric;

use BestServedCold\PhalueObjects\VOArray;

/**
 * Class DeclaredClass
 *
 * @package BestServedCold\PhalueObjects\Metric
 */
class DeclaredClass extends VOArray implements MetricInterface
{
    /**
     * @return static
     */
    public static function now()
    {
        return new static(get_declared_classes());
    }
}
