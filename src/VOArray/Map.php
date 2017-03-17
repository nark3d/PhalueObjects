<?php

namespace BestServedCold\PhalueObjects\VOArray;

use BestServedCold\PhalueObjects\Variadic;
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
     * Map constructor.
     *
     * @param \Closure $value
     * @param \array[] ...$array
     */
    public function __construct(\Closure $value, array ...$array)
    {
        parent::__construct(call_user_func_array('array_map', func_get_args()));
    }
}

