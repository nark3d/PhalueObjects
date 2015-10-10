<?php

namespace BestServedCold\PhalueObjects\Pattern;

use BestServedCold\PhalueObjects\Pattern\Singleton\SingletonInterface;

class Multiton extends UnConstructable implements SingletonInterface
{
    /**
     * @var array $instances
     */
    private static $instances = [];

    /**
     * Prevent class from being constructed.
     */
    private function __construct() {}

    /**
     * Get instance from $instances array.
     *
     * If the called class is present in the static $instances array, then return it.
     * Otherwise, create a new copy of the class and store it in the $instances
     * array.
     *
     * @return mixed
     */
    final public static function getInstance()
    {
        $calledClass = get_called_class();

        if (!isset(self::$instances[ $calledClass ])) {
            self::$instances[ $calledClass ] = new $calledClass();
        }

        return self::$instances[ $calledClass ];
    }
}
