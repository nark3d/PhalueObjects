<?php

namespace BestServedCold\PhalueObjects\Format\String;

use BestServedCold\PhalueObjects\Contract\VOArrayable;

/**
 * Class Json
 *
 * @package BestServedCold\PhalueObjects\Format
 */
class Json extends AbstractString implements VOArrayable
{
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
