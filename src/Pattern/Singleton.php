<?php

namespace BestServedCold\PhalueObjects\Pattern;

use BestServedCold\PhalueObjects\Pattern\Singleton\SingletonInterface;

/**
 * Class Singleton
 *
 * @package   BestServedCold\PhalueObjects\Pattern
 * @author    Adam Lewis <adam.lewis@bestservedcold.com>
 * @copyright Copyright (c) 2015 Best Served Cold Media Limited
 * @license	  http://http://opensource.org/licenses/GPL-3.0 GPL License
 * @link	  http://bestservedcold.com
 * @since	  0.0.1-alpha
 * @version   0.0.2-alpha
 */
class Singleton extends NotConstructable implements SingletonInterface
{
    /**
     * @var $instance
     */
    protected static $instance;

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

    final public static function destroy()
    {
        self::$instance = [ ];
    }
}
