<?php

namespace BestServedCold\PhalueObjects\Utility;

use BestServedCold\PhalueObjects\Format\Yaml;
use BestServedCold\PhalueObjects\Pattern\Singleton;
use BestServedCold\PhalueObjects\VOArray\Find;

/**
 * Class Language
 *
 * @package   BestServedCold\PhalueObjects\Utility
 * @author    Adam Lewis <adam.lewis@bestservedcold.com>
 * @copyright Copyright (c) 2015 Best Served Cold Media Limited
 * @license   http://http://opensource.org/licenses/GPL-3.0 GPL License
 * @link      http://bestservedcold.com
 * @since     0.0.1-alpha
 * @version   0.0.2-alpha
 */
final class Language extends Singleton
{
    /**
     * @var string
     */
    protected static $path = '/Language/';

    /**
     * @param  $identifier
     * @return array
     */
    public static function buildLanguage($identifier)
    {
        return [
            $identifier =>
                Yaml::fromString(self::getFileString($identifier))->toArray()
        ];
    }

    /**
     * @param  $identifier
     * @return string
     */
    public static function getFileString($identifier)
    {
        return __DIR__.self::$path.Configuration::get('language.locale').
            "/".$identifier.'.yml';
    }

    /**
     * @param  $key
     * @return mixed
     */
    public static function get($key)
    {
        $singleton = self::getInstance();
        $identifier = self::getIdentifier($key);

        if (
            empty($singleton::$language) ||
            !isset($singleton::$language[ $identifier ])
        ) {
            $singleton::$language = self::buildLanguage($identifier);
        }

        return VOArray::fromArray($singleton::$language)->jsonNotation($key);
    }

    /**
     * This doesn't work... Looking to remove all this non value object stuff soon.
     * @param  $key
     * @return array|mixed
     */
    private static function getIdentifier($key)
    {
        $file = Find::fromArray($key)->jsonNotation($key);
        return is_array($file) ? reset($file) : $file;
    }
}
