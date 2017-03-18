<?php

namespace BestServedCold\PhalueObjects\VOString;

use BestServedCold\PhalueObjects\VOString;

use BestServedCold\PhalueObjects\VOArray\Map\Attribute as VOArrayAttribute;

/**
 * Class Attribute
 *
 * @package BestServedCold\PhalueObjects\String
 */
class Attribute extends VOString
{
    /**
     * @param  array  $array
     * @return string
     */
    public static function fromArray(array $array)
    {
        return new static(VOArrayAttribute::fromArray($array)->implode(' '));
    }
}
