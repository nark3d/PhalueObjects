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
     * @return array
     */
    public abstract function toArray();

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
        return VOArray::fromArray(self::toArray());
    }
}
