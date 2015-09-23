<?php namespace BestServedCold\PhalueObjects\Utilities\FileLoader;

use BestServedCold\PhalueObjects\Utilities\FileLoader;

class Yaml extends FileLoader
{
    public static function getYml()
    {
        var_dunp(self::$path);
        self::getFileLocator(self::$path);
        return (
            new YamlConfigurationLoader(self::$fileLocator)
        )->load(
                self::$fileLocator->locate(self::$file)
            );
    }
}