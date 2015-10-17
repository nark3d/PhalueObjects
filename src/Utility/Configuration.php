<?php

namespace BestServedCold\PhalueObjects\Utility;

use BestServedCold\PhalueObjects\ExtendedArray\ExtendedArrayTrait;
use BestServedCold\PhalueObjects\File\Yaml;
use BestServedCold\PhalueObjects\Pattern\Singleton;

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
 * @license	  http://http://opensource.org/licenses/GPL-3.0 GPL License
 * @link	  http://bestservedcold.com
 * @since	  0.0.1-alpha
 * @version   0.0.2-alpha
 */
class Configuration extends Singleton
{
    use ExtendedArrayTrait;

    private static $configuration = [];

    private $bob = ['bob'];
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
        empty(self::$configuration) ? self::setConfiguration() : null;
        return self::getFromArrayUsingJsonNotation(self::$configuration, $key);
    }

    private static function setConfiguration()
    {
        self::$configuration = Yaml::fromString(__DIR__ . self::$file)->parse();
    }
}
