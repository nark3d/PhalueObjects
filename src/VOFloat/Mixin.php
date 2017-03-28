<?php

namespace BestServedCold\PhalueObjects\VOFloat;

use BestServedCold\PhalueObjects\VOFloat;

/**
 * Class Mixin
 *
 * @package BestServedCold\PhalueObjects\VOFloat
 */
trait Mixin
{
    /**
     * @param  VOFloat $voFloat
     * @return static
     */
    public static function fromVOFloat(VOFloat $voFloat)
    {
        return static::fromFloat($voFloat->getValue());
    }

    /**
     * @return VOFloat
     */
    public function toVOFloat()
    {
        return new VOFloat($this->toFloat());
    }
}
