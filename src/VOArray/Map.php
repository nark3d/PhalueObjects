<?php

namespace BestServedCold\PhalueObjects\VOArray;

use BestServedCold\PhalueObjects\VOArray;
use BestServedCold\PhalueObjects\VOClosure;

/**
 * Class Map
 *
 * @package BestServedCold\PhalueObjects\VOArray
 */
class Map extends VOArray
{
    /**
     * @param  VOClosure $value
     * @param  \array[]  ...$array
     * @return static
     */
    public static function fromVariadic(VOClosure $value, array ...$array)
    {
        return new static(
            call_user_func_array('array_map', array_merge([ $value->getValue() ], $array))
        );
    }
}
