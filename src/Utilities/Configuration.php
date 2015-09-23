<?php namespace BestServedCold\PhalueObjects\Utilities;

use BestServedCold\PhalueObjects\ExtendedArray\ExtendedArrayTrait;
use BestServedCold\PhalueObjects\Utilities\Configuration\Definition;
use BestServedCold\PhalueObjects\Utilities\FileLoader\Yaml;
use Symfony\Component\Config\Definition\Processor;

class Configuration extends Yaml
{
    use ExtendedArrayTrait;

    private static $configuration = [ ];
    protected static $path = '/Configuration';
    protected static $file = 'configuration.yml';
    protected static $fileLocator;

    public static function buildConfiguration()
    {
        return (new Processor())
            ->processConfiguration(new Definition(), self::getYml(__DIR__ . self::$path, self::$file));
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
