<?php

namespace BestServedCold\PhalueObjects\Metric;

use BestServedCold\PhalueObjects\Metric;

/**
 * Class DeclaredTrait
 *
 * @package BestServedCold\PhalueObjects\Metric
 */
class DeclaredTrait extends Metric implements MetricInterface
{
    /**
     * @return static
     */
    public static function now()
    {
        return new static(get_declared_traits());
    }
}
