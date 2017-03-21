<?php namespace BestServedCold\PhalueObjects\File;

use BestServedCold\PhalueObjects\Exception\InvalidTypeException;
use BestServedCold\PhalueObjects\File;
use BestServedCold\PhalueObjects\Request\File as RequestFile;

/**
 * Class Local
 *
 * @package BestServedCold\PhalueObjects\File
 */
class Local extends File
{
    /**
     * @param  RequestFile $url
     * @return static
     */
    public static function fromRequestFile(RequestFile $url)
    {
        return new static($url->getContents());
    }

    /**
     * @param  string $path
     * @return static
     */
    public static function fromPath($path)
    {
        if (! is_string($path)) {
            throw new InvalidTypeException($path, [ 'path' ]);
        }

        return static::fromRequestFile(RequestFile::fromPath($path));
    }
}
