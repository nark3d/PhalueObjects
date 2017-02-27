<?php

namespace BestServedCold\PhalueObjects\Utility;

use BestServedCold\PhalueObjects\Metric;
use BestServedCold\PhalueObjects\Metric\DeclaredClass;
use BestServedCold\PhalueObjects\Metric\DeclaredInterface;
use BestServedCold\PhalueObjects\Metric\DeclaredTrait;
use BestServedCold\PhalueObjects\Metric\DefinedConstant;
use BestServedCold\PhalueObjects\Metric\DefinedFunction;
use BestServedCold\PhalueObjects\Metric\IncludedFile;
use BestServedCold\PhalueObjects\Metric\MemoryUsage;
use BestServedCold\PhalueObjects\Metric\MicroTime;
use BestServedCold\PhalueObjects\Metric\PeakMemoryUsage;

class Benchmark
{
    /**
     * @var array
     */
    protected static $markers = [];

    /**
     * @var string
     */
    protected static $lastName;

    /**
     * @var array
     */
    protected static $metrics  = [
        MicroTime::class,
        MemoryUsage::class,
        DeclaredInterface::class,
        DeclaredTrait::class,
        DefinedFunction::class,
        DefinedConstant::class,
        IncludedFile::class,
        DeclaredClass::class,
    ];

    /**
     * @param  bool   $name
     * @return string
     */
    public static function human($name = false)
    {
        return implode(array_map(function ($key, $value) {
             return '[' . $key . ']: [' . (string) $value . "]\n";
        }, array_keys(self::get($name)), self::get($name)));
    }

    /**
     * @param  bool        $name
     * @return array|mixed
     */
    public static function get($name = false)
    {
        return $name ? self::$markers[$name] : self::$markers;
    }

    /**
     * @param bool $name
     */
    public static function start($name = false)
    {
        /** @var Metric $metric */
        foreach (self::$metrics as $metric) {
            $now = $metric::now();
            self::$markers[self::getName($name)][$now->getShortName()] = $now;
        }
    }

    /**
     * @param bool $name
     */
    public static function stop($name = false)
    {
        self::stopMarkers($name ?: self::getLastName());
    }

    /**
     * @param $name
     */
    private static function stopMarkers($name)
    {
        /** @var Metric $metric */
        foreach (self::$markers[$name] as $metric) {
            self::$markers[$name][$metric->getShortName()] = $metric::now()->diff($metric);
        }

        self::addPeak($name);
    }

    /**
     * @param $name
     */
    private static function addPeak($name)
    {
        $peak = PeakMemoryUsage::now();
        self::$markers[$name][$peak->getShortName()] = $peak;
    }

    /**
     * @return string
     */
    private static function getLastName()
    {
        $name           = self::$lastName;
        self::$lastName = null;
        return $name;
    }

    /**
     * @param  bool   $name
     * @return string
     */
    private static function getName($name = false)
    {
        self::$lastName = $name ?: uniqid();
        return self::$lastName;
    }
}
