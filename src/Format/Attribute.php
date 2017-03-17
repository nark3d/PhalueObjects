<?php

namespace BestServedCold\PhalueObjects\Format;

use BestServedCold\PhalueObjects\Format;
use BestServedCold\PhalueObjects\VOArray\Map;

/**
 * Class Attribute
 *
 * @package BestServedCold\PhalueObjects\Format
 */
class Attribute extends Format
{
    /**
     * @param array $array
     * @return string
     */
    public static function fromArray(array $array)
    {
        $map = new Map(self::fromArrayString(), array_keys($array), $array);
        return new static(implode(' ', $map->getValue()));
    }

    /**
     * return \Closure
     */
    private static function fromArrayString()
    {
        return function ($key, $value) {
            return is_null($value) ? $key : $key.'="'.$value.'"';
        };
    }
}
