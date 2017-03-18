<?php

namespace BestServedCold\PhalueObjects\VOString;

use BestServedCold\PhalueObjects\VOString;
use BestServedCold\PhalueObjects\VOArray\Map\Pair as VOArrayPair;

/**
 * Class Pair
 *
 * @package BestServedCold\PhalueObjects\VOString
 */
class Pair extends VOString
{
    /**
     * @param array $array
     * @return string
     */
    public static function fromArray(array $array)
    {
        return new static(VOArrayPair::fromArray($array)->implode(','));
    }
}
