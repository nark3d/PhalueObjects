<?php namespace BestServedCold\PhalueObjects\Utility;

use BestServedCold\PhalueObjects\ExtendedArray\ExtendedArrayTrait;
use BestServedCold\PhalueObjects\Pattern\Singleton;
use Symfony\Component\Yaml\Yaml;

final class Language extends Singleton
{
    use ExtendedArrayTrait;

    private static $language = [];
    protected static $path = '/Language/';

    public static function buildLanguage($file)
    {
        $locale = Configuration::get('language.locale');
        return [$file => Yaml::parse(file_get_contents(__DIR__ . self::$path . "$locale/" . $file . '.yml'))];
    }

    public static function get($key)
    {
        $language = self::singleton();
        $file = self::getFile($key);

        if (empty($language::$language) || ! isset($language::$language[$file])) {
            $language::$language = self::buildLanguage($file);
        }

        return self::getFromArrayUsingJsonNotation($language::$language, $key);
    }

    private static function getFile($key)
    {
        $file = self::getArrayUsingJsonNotation($key);
        return is_array($file) ? reset($file) : $file;
    }
}
