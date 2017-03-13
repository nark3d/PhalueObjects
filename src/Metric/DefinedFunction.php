<?php

namespace BestServedCold\PhalueObjects\Metric;

use BestServedCold\PhalueObjects\Metric;

/**
 * Class DefinedFunction
 * 
 * @package BestServedCold\PhalueObjects\Metric
 */
class DefinedFunction extends Metric implements MetricInterface
{
    /**
     * @return static
     */
    public static function now()
    {
        return new static(get_defined_functions()[ 'user' ]);
    }
}
