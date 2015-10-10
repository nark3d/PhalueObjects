<?php

namespace BestServedCold\PhalueObjects\Utility;

use BestServedCold\PhalueObjects\ExtendedArray\ExtendedArrayTrait;
use BestServedCold\PhalueObjects\Pattern\Singleton\Multiton;
use Symfony\Component\Yaml\Yaml;

final class Language extends Multiton
{
    use ExtendedArrayTrait;

    protected static $path = '/Language/';

    public static function buildLanguage($file)
    {
        return [
            $file => Yaml::parse(
                file_get_contents(
                    __DIR__ . self::$path . Configuration::get('language.locale') .
                    "/" . $file . '.yml'
                )
            )
        ];
    }

    public static function get($key)
    {
        $singleton = self::getInstance();
        $file = self::getFile($key);

        if (empty($singleton::$language) || !isset($singleton::$language[ $file ])) {
            $singleton::$language = self::buildLanguage($file);
        }

        return self::getFromArrayUsingJsonNotation($singleton::$language, $key);
    }

    private static function getFile($key)
    {
        $file = self::getArrayUsingJsonNotation($key);

        return is_array($file) ? reset($file) : $file;
    }
}
