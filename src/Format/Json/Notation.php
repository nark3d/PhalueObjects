<?php

namespace BestServedCold\PhalueObjects\Format\Json;

use BestServedCold\PhalueObjects\Contract\VOArrayable;
use BestServedCold\PhalueObjects\VOString;
use BestServedCold\PhalueObjects\VOArray\Mixin as VOArrayMixin;

/**
 * Class Notation
 *
 * @package BestServedCold\PhalueObjects\Format\Json
 */
class Notation extends VOString implements VOArrayable
{
    use VOArrayMixin;

    /**
     * @return array
     */
    public function toArray()
    {
        return explode('.', $this->getValue());
    }

    /**
     * @param  array  $array
     * @return static
     */
    public static function fromArray(array $array)
    {
        return new static(implode('.', $array));
    }
}
