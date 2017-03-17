<?php

namespace BestServedCold\PhalueObjects;

use BestServedCold\PhalueObjects\Exception\InvalidTypeException;

class VOStringTest extends TestCase
{
    public function testConstructor()
    {
        self::assertEquals('string', (new VOString('string'))->getValue());
        self::setExpectedException(InvalidTypeException::class);
        new VOString(['bob']);
    }
}
