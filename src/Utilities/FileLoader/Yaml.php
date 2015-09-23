<?php namespace BestServedCold\PhalueObjects\Utilities\FileLoader;

use BestServedCold\PhalueObjects\Utilities\FileLoader;

class Yaml extends FileLoader
{
    public static function getYml($path, $file)
    {
        self::getFileLocator($path);
        return (new YamlConfigurationLoader(self::$fileLocator))->load(self::$fileLocator->locate($file));
    }
}