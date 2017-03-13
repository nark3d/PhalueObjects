<?php

namespace BestServedCold\PhalueObjects\Utility;

use BestServedCold\PhalueObjects\ExtendedArray\ExtendedArrayTrait;
use BestServedCold\PhalueObjects\Format\Yaml;
use BestServedCold\PhalueObjects\Pattern\Singleton;

/**
 * Class Language
 *
 * @package   BestServedCold\PhalueObjects\Utility
 * @author    Adam Lewis <adam.lewis@bestservedcold.com>
 * @copyright Copyright (c) 2015 Best Served Cold Media Limited
 * @license	  http://http://opensource.org/licenses/GPL-3.0 GPL License
 * @link	  http://bestservedcold.com
 * @since	  0.0.1-alpha
 * @version   0.0.2-alpha
 */
final class Language extends Singleton
{
    use ExtendedArrayTrait;

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
                Yaml::fromString(self::getFileString($identifier))->parse()
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

        return self::getFromArrayUsingJsonNotation($singleton::$language, $key);
    }

    /**
     * @param  $key
     * @return array|mixed
     */
    private static function getIdentifier($key)
    {
        $file = self::getArrayUsingJsonNotation($key);
        return is_array($file) ? reset($file) : $file;
    }
}
