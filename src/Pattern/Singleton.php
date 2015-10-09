<?php

namespace BestServedCold\PhalueObjects\Pattern;

abstract class Singleton
{
    protected static $instance;

    private function __clone()
    {
    }

    private function __construct()
    {
    }

    private function __wakeup()
    {
    }

    final public static function singleton()
    {
        static $instances = [ ];

        $classCalled = get_called_class();

        if (!isset($instances[ $classCalled ])) {
            $instances[ $classCalled ] = new $classCalled();
        }

        return $instances[ $classCalled ];
    }
}
