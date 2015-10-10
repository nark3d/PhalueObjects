<?php

namespace BestServedCold\PhalueObjects\Utility;

use BestServedCold\PhalueObjects\ExtendedArray\ExtendedArrayTrait;
use BestServedCold\PhalueObjects\Pattern\Singleton\Multiton;
use Symfony\Component\Yaml\Yaml;

final class Language extends Multiton
{
    use ExtendedArrayTrait;

    protected static $path = '/Language/';

    public static function buildLanguage($identifier)
    {
        return [
            $identifier =>
                Yaml::parse(file_get_contents(self::getFileString($identifier)))
        ];
    }

    public static function getFileString($identifier)
    {
        return __DIR__ . self::$path . Configuration::get('language.locale') .
            "/" . $identifier . '.yml';
    }

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

    private static function getIdentifier($key)
    {
        $file = self::getArrayUsingJsonNotation($key);
        return is_array($file) ? reset($file) : $file;
    }
}
