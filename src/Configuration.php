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

    public static function buildConfiguration()
    {
        $locator = new FileLocator(__DIR__ . '/Configuration');
        $loader = new YamlConfigurationLoader($locator);
        $configValues = $loader->load($locator->locate('configuration.yml'));

        $configuration = (new Processor())->processConfiguration(
                new Definition(),
                $configValues);

        return $configuration;
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
