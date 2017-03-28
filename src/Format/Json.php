<?php

namespace BestServedCold\PhalueObjects\Format;

use BestServedCold\PhalueObjects\Contract\VOArrayable;
use BestServedCold\PhalueObjects\VOString;
use BestServedCold\PhalueObjects\VOArray\Mixin as VOArrayMixin;

/**
 * Class Json
 *
 * @package BestServedCold\PhalueObjects\Format
 */
class Json extends VOString implements VOArrayable
{
    use VOArrayMixin;

    /**
     * @return array
     */
    public function toArray()
    {
        return (array) json_decode($this->getValue(), true);
    }

    /**
     * @param  array  $array
     * @return static
     */
    public static function fromArray(array $array)
    {
        return new static(json_encode($array));
    }
}
