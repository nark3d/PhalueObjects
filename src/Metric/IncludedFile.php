<?php

namespace BestServedCold\PhalueObjects\Metric;

use BestServedCold\PhalueObjects\VOArray;

/**
 * Class IncludedFile
 *
 * @package BestServedCold\PhalueObjects\Metric
 */
class IncludedFile extends VOArray implements MetricInterface
{
    /**
     * @return static
     */
    public static function now()
    {
        return new static(get_included_files());
    }
}
