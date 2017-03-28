<?php

namespace BestServedCold\PhalueObjects\Metric;

use BestServedCold\PhalueObjects\VOArray;
use BestServedCold\PhalueObjects\VOString\Pair;

/**
 * Class DefinedConstant
 *
 * @package BestServedCold\PhalueObjects\Metric
 */
class DefinedConstant extends VOArray implements MetricInterface
{
    /**
     * @return static
     */
    public static function now()
    {
        return new static(get_defined_constants(true)[ 'user' ]);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return Pair::fromArray($this->getValue())->getValue();
    }
}
