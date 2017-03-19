<?php

namespace BestServedCold\PhalueObjects\Pattern;

/**
 * Class SomeSingletonClass
 *
 * @package BestServedCold\PhalueObjects\Pattern
 */
class SomeSingletonClass extends Singleton
{
    public static $someVariable = 'someValue';

    public static function get()
    {
        return static::getInstance();
    }
}
