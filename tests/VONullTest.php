<?php

namespace BestServedCold\PhalueObjects;

use BestServedCold\PhalueObjects\Exception\InvalidTypeException;

/**
 * Class VONullTest
 *
 * @package BestServedCold\PhalueObjects
 */
class VONullTest extends TestCase
{
    public function testConstructor()
    {
        self::assertNull((new VONull(null))->getValue());
        self::setExpectedException(InvalidTypeException::class);
        new VONull('thisIsNotNull');
    }
}
