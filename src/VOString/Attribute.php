<?php

namespace BestServedCold\PhalueObjects\VOString;

use BestServedCold\PhalueObjects\VOArray\Map\Attribute as VOArrayAttribute;
use BestServedCold\PhalueObjects\VOString;

/**
 * Class Attribute
 *
 * @package BestServedCold\PhalueObjects\String
 */
class Attribute extends VOString
{
    /**
     * @param  array  $array
     * @return Attribute
     */
    public static function fromArray(array $array)
    {
        return new static(VOArrayAttribute::fromArray($array)->implode(' '));
    }
}
