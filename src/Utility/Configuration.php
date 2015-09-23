<?php namespace BestServedCold\PhalueObjects\Utility;

use BestServedCold\PhalueObjects\ExtendedArray\ExtendedArrayTrait;
use BestServedCold\PhalueObjects\Pattern\Singleton;
use Symfony\Component\Yaml\Yaml;

class Configuration extends Singleton
{
    use ExtendedArrayTrait;

    private static $configuration = [];
    protected static $path = '/Configuration/';
    protected static $file = 'configuration.yml';

    public static function buildConfiguration()
    {
        return Yaml::parse(file_get_contents(__DIR__ . self::$path . self::$file));
    }

    public static function get($key)
    {
        $config = self::singleton();

        if (empty($config::$configuration)) {
            $config::$configuration = self::buildConfiguration();
        }

        return self::getFromArrayUsingJsonNotation($config::$configuration, $key);
    }
}