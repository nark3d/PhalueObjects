<?php namespace BestServedCold\PhalueObjects\Utilities;

use BestServedCold\PhalueObjects\Pattern\Singleton;
use Symfony\Component\Config\FileLocator;

class FileLoader extends Singleton
{
    protected static $path;
    protected static $file;
    protected static $fileLocator;

    protected static function getFileLocator($path)
    {
        self::$fileLocator = new FileLocator(__DIR__ . $path);
    }
}
