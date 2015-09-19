<?php namespace BestServedCold\PhalueObjects;

use BestServedCold\PhalueObjects\Config\Configuration;
use BestServedCold\PhalueObjects\Config\YamlConfigLoader;
use BestServedCold\PhalueObjects\ExtendedArray\ExtendedArrayTrait;
use BestServedCold\PhalueObjects\Pattern\Singleton;
use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\Config\FileLocator;


class Config extends Singleton
{
    use ExtendedArrayTrait;

    private static $configuration = [];

    public static function buildConfiguration()
    {
        $locator = new FileLocator(__DIR__ . '/Config');
        $loader = new YamlConfigLoader($locator);
        $configValues = $loader->load($locator->locate('Config.yml'));

        $configuration = (new Processor())->processConfiguration(
                new Configuration(),
                $configValues);

        return $configuration;
    }

    public static function get($key)
    {
        $config = self::singleton();

        if (empty($config::$configuration)) {
            echo "I'm doing this";
            $config::$configuration = self::buildConfiguration();
        }

        return self::getFromArrayUsingJsonNotation($config::$configuration, $key);
    }
}