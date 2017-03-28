<?php

namespace BestServedCold\PhalueObjects\Metric;

use BestServedCold\PhalueObjects\VOArray;

/**
 * Class DeclaredInterface
 *
 * @package BestServedCold\PhalueObjects\Metric
 */
class DeclaredInterface extends VOArray implements MetricInterface
{
    /**
     * @return static
     */
    public static function now()
    {
        return new static(get_declared_interfaces());
    }
}
