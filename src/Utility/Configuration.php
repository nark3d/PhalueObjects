<?php

namespace BestServedCold\PhalueObjects\Utility;

use BestServedCold\PhalueObjects\ExtendedArray\ExtendedArrayTrait;
use BestServedCold\PhalueObjects\Pattern\Singleton\Multiton;
use Symfony\Component\Yaml\Yaml;

class Configuration extends Multiton
{
    use ExtendedArrayTrait;

    protected static $path = '/Configuration/';
    protected static $file = 'configuration.yml';

    public static function buildConfiguration()
    {
        return Yaml::parse(file_get_contents(__DIR__ . self::$path . self::$file));
    }

    /**
     * @param string $key
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
