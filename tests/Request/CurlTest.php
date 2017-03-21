<?php

namespace BestServedCold\PhalueObjects\Request;

use BestServedCold\PhalueObjects\Exception\InvalidTypeException;
use BestServedCold\PhalueObjects\TestCase;

/**
 * Class CurlTest
 *
 * @package BestServedCold\PhalueObjects\Request
 */
class CurlTest extends TestCase
{
    private $curl;

    public function setUp()
    {
        parent::setUp();
        $this->curl = new Curl(curl_init());
    }

    public function testConstructor()
    {
        $curl = new Curl(curl_init());
        self::assertTrue(is_resource($curl->getValue()));
        self::assertEquals('curl', get_resource_type($curl->getValue()));
        self::setExpectedException(InvalidTypeException::class);
        new Curl('notAResource');
    }

    public function testFromOptions()
    {
        $curl = Curl::fromOptions(curl_init());
        self::assertTrue(is_resource($curl->getValue()));
        self::assertEquals('curl', get_resource_type($curl->getValue()));
    }

    public function testAuto()
    {
        $curl = Curl::auto([CURLOPT_URL => 'http://example.com']);
        self::assertTrue(is_resource($curl->getValue()));
        self::assertEquals('curl', get_resource_type($curl->getValue()));
    }

    public function testSetOptions()
    {
        $curl = Curl::auto([CURLOPT_URL => 'http://example.com']);
        $info = curl_getinfo($curl->getValue());
        self::assertEquals('http://example.com', $info['url']);
    }

    public function testGetInfo()
    {
        $curl = Curl::auto();
        self::assertTrue(is_array($curl->getInfo()));
    }

    public function testGetContents()
    {
        self::assertFalse(Curl::auto()->getContents());
    }
}
