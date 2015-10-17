<?php

namespace BestServedCold\PhalueObjects\Pattern;

/**
 * Class Multiton
 *
 * @package   BestServedCold\PhalueObjects\Pattern
 * @author    Adam Lewis <adam.lewis@bestservedcold.com>
 * @copyright Copyright (c) 2015 Best Served Cold Media Limited
 * @license	  http://http://opensource.org/licenses/GPL-3.0 GPL License
 * @link	  http://bestservedcold.com
 * @since	  0.0.1-alpha
 * @version   0.0.2-alpha
 */
class Singleton extends NotConstructable
{
    /**
     * @var array $instances
     */
    protected static $instances = [ ];

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

    /**
     * Destroy
     *
     * @return void
     */
    final public static function destroy()
    {
        self::$instances = [ ];
    }

    /**
     * @param $instance
     */
    final public static function destroyInstance($instance)
    {
        unset(self::$instances[ $instance ]);
    }
}
