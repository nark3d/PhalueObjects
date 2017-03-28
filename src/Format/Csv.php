<?php

namespace BestServedCold\PhalueObjects\Format;

use BestServedCold\PhalueObjects\Contract\VOArrayable;
use BestServedCold\PhalueObjects\VOString;
use BestServedCold\PhalueObjects\VOArray\Mixin as VOArrayMixin;

/**
 * Class Csv
 *
 * @package BestServedCold\PhalueObjects\Format
 */
class Csv extends VOString implements VOArrayable
{
    use VOArrayMixin;

    /**
     * @param  array       $array
     * @param  string|null $space
     * @return static
     */
    public static function fromArray(array $array, $space = null)
    {
        return new static(implode(',' . $space, $array));
    }

    private static function fromMultiArray(array $array, $space = null)
    {

    }

    /**
     * @return array
     */
    public function toArray()
    {
        return explode(',', $this->getValue());
    }
}
