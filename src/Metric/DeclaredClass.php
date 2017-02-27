<?php

namespace BestServedCold\PhalueObjects\Metric;

use BestServedCold\PhalueObjects\Metric;

/**
 * Class DeclaredClass
 *
 * @package BestServedCold\PhalueObjects\Metric
 */
class DeclaredClass extends Metric implements MetricInterface
{
    /**
     * @return static
     */
    public static function now()
    {
        return new static(get_declared_classes());
    }
}
