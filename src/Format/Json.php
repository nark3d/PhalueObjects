<?php

namespace BestServedCold\PhalueObjects\Format;

use BestServedCold\PhalueObjects\Contract\VOArrayable;
use BestServedCold\PhalueObjects\VOString;

/**
 * Class Json
 *
 * @package BestServedCold\PhalueObjects\Format
 */
class Json extends VOString implements VOArrayable
{
    use StringMixin;

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
