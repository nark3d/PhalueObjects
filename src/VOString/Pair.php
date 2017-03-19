<?php

namespace BestServedCold\PhalueObjects\VOString;

use BestServedCold\PhalueObjects\VOArray\Map\Pair as VOArrayPair;
use BestServedCold\PhalueObjects\VOString;

/**
 * Class Pair
 *
 * @package BestServedCold\PhalueObjects\VOString
 */
class Pair extends VOString
{
    /**
     * @param array $array
     * @return Pair
     */
    public static function fromArray(array $array)
    {
        return new static(VOArrayPair::fromArray($array)->implode(','));
    }
}
