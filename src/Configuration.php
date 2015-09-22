<?php namespace BestServedCold\PhalueObjects;

use BestServedCold\PhalueObjects\Configuration\Definition;
use BestServedCold\PhalueObjects\Configuration\YamlConfigurationLoader;
use BestServedCold\PhalueObjects\ExtendedArray\ExtendedArrayTrait;
use BestServedCold\PhalueObjects\Pattern\Singleton;
use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\Config\FileLocator;


class Configuration extends Singleton
{
    use ExtendedArrayTrait;

    private static $configuration = [];
    private static $path = '/Configuration';
    private static $file = 'configuration.yml';
    private static $fileLocator;

    private static function getFileLocator($path)
    {
        self::$fileLocator = new FileLocator(__DIR__ . $path);
    }

    public static function getYml()
    {
        self::getFileLocator(self::$path);
        return (new YamlConfigurationLoader(self::$fileLocator))
            ->load(self::$fileLocator->locate(self::$file));

    }

    public static function buildConfiguration()
    {
        return (new Processor())
            ->processConfiguration(new Definition(),self::getYml());
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
