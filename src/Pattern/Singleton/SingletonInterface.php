<?php namespace BestServedCold\PhalueObjects\Pattern\Singleton;

/**
 * Interface SingletonInterface
 *
 * @package   BestServedCold\PhalueObjects\Pattern\Singleton
 * @author    Adam Lewis <adam.lewis@bestservedcold.com>
 * @copyright Copyright (c) 2015 Best Served Cold Media Limited
 * @license	  http://http://opensource.org/licenses/GPL-3.0 GPL License
 * @link	  http://bestservedcold.com
 * @since	  0.0.1-alpha
 * @version   0.0.2-alpha
 */
interface SingletonInterface
{
    /**
     * Get Singleton instance.
     *
     * @return object
     */
    public static function getInstance();
}
