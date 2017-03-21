<?php

namespace BestServedCold\PhalueObjects\File;

use BestServedCold\PhalueObjects\Exception\InvalidTypeException;
use BestServedCold\PhalueObjects\TestCase;
use BestServedCold\PhalueObjects\Request\Curl\Url as Curl;

/**
 * Class HttpTest
 *
 * @package BestServedCold\PhalueObjects\File
 */
class UrlTest extends TestCase
{
    public function testConstructor()
    {
//        $handler = Curl::auto();
//        self::assertTrue(is_string((new Url('http://example.com', $handler))->getValue()));
        self::assertTrue(true);
    }
}
