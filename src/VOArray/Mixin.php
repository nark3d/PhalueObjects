<?php

namespace BestServedCold\PhalueObjects\VOArray;

use BestServedCold\PhalueObjects\VOArray;

/**
 * Class Mixin
 *
 * @package BestServedCold\PhalueObjects\VOArray
 */
trait Mixin
{
    /**
     * @param  VOArray $voArray
     * @return static
     */
    public static function fromVOArray(VOArray $voArray)
    {
        return static::fromArray($voArray->getValue());
    }

    /**
     * @return VOArray
     */
    public function toVOArray()
    {
        return VOArray::fromArray(static::toArray());
    }
}
