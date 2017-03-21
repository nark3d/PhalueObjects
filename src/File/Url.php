<?php namespace BestServedCold\PhalueObjects\File;

use BestServedCold\PhalueObjects\Exception\InvalidTypeException;
use BestServedCold\PhalueObjects\File;
use BestServedCold\PhalueObjects\Request\Curl\Url as CurlUrl;

/**
 * Class Url
 *
 * @package BestServedCold\PhalueObjects\File
 */
class Url extends File
{
    /**
     * @param  CurlUrl $url
     * @return static
     */
    public static function fromCurlUrl(CurlUrl $url)
    {
        return new static($url->execute());
    }

    /**
     * @param  string $url
     * @return static
     */
    public static function fromUrl($url)
    {
        if (! filter_var($url, FILTER_VALIDATE_URL)) {
            throw new InvalidTypeException($url, [ 'url' ]);
        }

        return static::fromCurlUrl(CurlUrl::auto([CURLOPT_URL => $url]));
    }
}
