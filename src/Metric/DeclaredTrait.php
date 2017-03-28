<?php

namespace BestServedCold\PhalueObjects\Metric;

use BestServedCold\PhalueObjects\VOArray;

/**
 * Class DeclaredTrait
 *
 * @package BestServedCold\PhalueObjects\Metric
 */
class DeclaredTrait extends VOArray implements MetricInterface
{
    /**
     * @return static
     */
    public static function now()
    {
        return new static(get_declared_traits());
    }
}
