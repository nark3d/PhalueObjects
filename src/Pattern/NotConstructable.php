<?php namespace BestServedCold\PhalueObjects\Pattern;

/**
 * Class UnConstructable
 *
 * @package   BestServedCold\PhalueObjects\Pattern
 * @author    Adam Lewis <adam.lewis@bestservedcold.com>
 * @copyright Copyright (c) 2015 Best Served Cold Media Limited
 * @license      http://http://opensource.org/licenses/GPL-3.0 GPL License
 * @link      http://bestservedcold.com
 * @since      0.0.1-alpha
 * @version   0.0.2-alpha
 */
abstract class NotConstructable
{
    /**
     * Prevent instance from being cloned.
     */
    private function __clone() {}

    /**
     * Prevent instance from being unserialised.
     */
    private function __wakeup() {}
}
