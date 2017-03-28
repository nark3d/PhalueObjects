<?php

namespace BestServedCold\PhalueObjects\Contract;

use BestServedCold\PhalueObjects\VOArray;

/**
 * Interface VOArrayable
 *
 * @package BestServedCold\PhalueObjects\Contract
 */
interface VOArrayable extends Arrayable
{
    /**
     * @param  VOArray $voArray
     * @return static
     */
    public static function fromVOArray(VOArray $voArray);

    /**
     * @return VOArray
     */
    public function toVOArray();
}
