<?php

namespace BestServedCold\PhalueObjects\Pattern;

use BestServedCold\PhalueObjects\Pattern\Singleton\SingletonInterface;

class Singleton extends UnConstructable implements SingletonInterface
{
    /**
     * @var $instance
     */
    private static $instance;

    /**
     * Prevent class from being constructed.
     */
    private function __construct() {}

    /**
     * Get singleton class.
     *
     * If the called class is present in the static $instances array, then return it.
     * Otherwise, create a new copy of the class and store it in the $instances
     * array.
     *
     * @return mixed
     */
    final public static function getInstance()
    {
        if (static::$instance === null) {
            static::$instance = new static;
        }

        return static::$instance;
    }
}
