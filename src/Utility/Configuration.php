<?php

namespace BestServedCold\PhalueObjects\Utility;

use BestServedCold\PhalueObjects\ExtendedArray\ExtendedArrayTrait;
use BestServedCold\PhalueObjects\Pattern\Singleton;
use Symfony\Component\Yaml\Yaml;

/**
 * Class Configuration
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

    /**
     * @var string
     */
    protected static $path = '/Configuration/';

    /**
     * @var string
     */
    protected static $file = 'configuration.yml';

    /**
     * @return array
     */
    public static function buildConfiguration()
    {
        return Yaml::parse(file_get_contents(self::getFileString()));
    }

    /**
     * @return string
     */
    public static function getFileString()
    {
        return __DIR__ . self::$path . self::$file;
    }

    /**
     * @param  $key
     * @return mixed
     */
    public static function get($key)
    {
        $config = self::getInstance();

        if (empty($config::$configuration)) {
            $config::$configuration = self::buildConfiguration();
        }

        return self::getFromArrayUsingJsonNotation($config::$configuration, $key);
    }
}
