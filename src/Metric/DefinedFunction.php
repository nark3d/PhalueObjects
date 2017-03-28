<?php

namespace BestServedCold\PhalueObjects\Metric;

use BestServedCold\PhalueObjects\VOArray;

/**
 * Class DefinedFunction
 *
 * @package BestServedCold\PhalueObjects\Metric
 */
class DefinedFunction extends VOArray implements MetricInterface
{
    /**
     * @return static
     */
    public static function now()
    {
        return new static(get_defined_functions()[ 'user' ]);
    }
}
