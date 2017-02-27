<?php

namespace BestServedCold\PhalueObjects\Metric;

use BestServedCold\PhalueObjects\Metric;

/**
 * Class IncludedFile
 *
 * @package BestServedCold\PhalueObjects\Metric
 */
class IncludedFile extends Metric implements MetricInterface
{
    /**
     * @return static
     */
    public static function now()
    {
        return new static(get_included_files());
    }
}
