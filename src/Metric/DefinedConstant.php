<?php

namespace BestServedCold\PhalueObjects\Metric;

use BestServedCold\PhalueObjects\ExtendedArray\ExtendedArrayTrait;
use BestServedCold\PhalueObjects\Metric;

/**
 * Class DefinedConstant
 *
 * @package BestServedCold\PhalueObjects\Metric
 */
class DefinedConstant extends Metric implements MetricInterface
{
    use ExtendedArrayTrait;

    /**
     * @return static
     */
    public static function now()
    {
        return new static(get_defined_constants(true)['user']);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->arrayToPairString($this->getValue());
    }
}
