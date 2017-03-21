<?php

namespace BestServedCold\PhalueObjects;

use BestServedCold\PhalueObjects\Exception\InvalidTypeException;

/**
 * Class VOResourceTest
 *
 * @package BestServedCold\PhalueObjects
 */
class VOResourceTest extends TestCase
{
    public function testConstructor()
    {
        self::assertTrue(is_resource((new VOResource(curl_init()))->getValue()));
        self::setExpectedException(InvalidTypeException::class);
        new VOResource('NotAResource');
    }
}
