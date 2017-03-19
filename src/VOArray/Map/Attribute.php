<?php

namespace BestServedCold\PhalueObjects\VOArray\Map;

use BestServedCold\PhalueObjects\VOArray;
use BestServedCold\PhalueObjects\VOArray\Map;
use BestServedCold\PhalueObjects\VOClosure\KeyValue;

/**
 * Class Attribute
 *
 * @package BestServedCold\PhalueObjects\VOArray\KeyValue
 */
class Attribute extends VOArray
{
    /**
     * @param  array  $array
     * @return VOArray
     */
    public static function fromArray(array $array)
    {
        return parent::fromArray(
            Map::fromVariadic(
                KeyValue::fromVars(null, '="', '"'),
                array_keys($array),
                $array
            )->getValue()
        );
    }
}
