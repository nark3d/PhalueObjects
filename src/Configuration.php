<?php namespace BestServedCold\PhalueObjects;

use BestServedCold\PhalueObjects\Configuration\Definition;
use BestServedCold\PhalueObjects\ExtendedArray\ExtendedArrayTrait;
use BestServedCold\PhalueObjects\Utilities\FileLoader\Yaml as PhalueObjectsYaml;
use Symfony\Component\Config\Definition\Processor;

class Configuration extends PhalueObjectsYaml
{
    use ExtendedArrayTrait;

    private static $configuration = [];
    protected static $path = '/Configuration';
    protected static $file = 'configuration.yml';
    protected static $fileLocator;

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
