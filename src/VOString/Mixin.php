<?php

namespace BestServedCold\PhalueObjects\VOString;

use BestServedCold\PhalueObjects\VOString;

/**
 * Class StringableTrait
 *
 * @package BestServedCold\PhalueObjects\VOString
 */
trait Mixin
{
    /**
     * @return string
     */
    public abstract function toString();

    /**
     * @return VOString
     */
    public function toVOString()
    {
        return VOString::fromString($this->toString());
    }

    /**
     * @param  VOString $voString
     * @return static
     */
    public static function fromVOString(VOString $voString)
    {
        return static::fromString($voString->getValue());
    }
}
