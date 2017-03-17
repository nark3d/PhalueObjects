<?php

namespace BestServedCold\PhalueObjects\Utility;

use BestServedCold\PhalueObjects\File\Yaml;
use BestServedCold\PhalueObjects\Format\Json\Notation;
use BestServedCold\PhalueObjects\Pattern\Singleton;
use BestServedCold\PhalueObjects\VOArray;

/**
 * Class Configuration
 *
 * Note: This class will work without extending the Singleton patter via the static
 * property. however, I've left it extended to make it clear that it is,
 * effectively, following the Singleton pattern.
 *
 * @package   BestServedCold\PhalueObjects\Utility
 * @author    Adam Lewis <adam.lewis@bestservedcold.com>
 * @copyright Copyright (c) 2015 Best Served Cold Media Limited
 * @license      http://http://opensource.org/licenses/GPL-3.0 GPL License
 * @link      http://bestservedcold.com
 * @since      0.0.1-alpha
 * @version   0.0.2-alpha
 */
class Configuration extends Singleton
{
    private static $configuration = [ ];

    /**
     * @var string
     */
    protected static $file = '/Configuration/configuration.yml';

    /**
     * @param  string $key
     * @return mixed
     */
    public static function get($key)
    {
        empty(self::$configuration) ? self::getConfiguration() : null;
        return VOArray::fromArray(self::$configuration)->jsonNotation(new Notation($key));
    }

    /**
     * Get Configuration
     *
     * @return array
     */
    public static function getConfiguration()
    {
        return self::$configuration = Yaml::fromString(__DIR__.self::$file)->parse();
    }
}
