<?php

namespace BestServedCold\PhalueObjects;

use BestServedCold\PhalueObjects\Exception\InvalidTypeException;
use stdClass;

class VOObjectTest extends TestCase
{
    public function testConstructor()
    {
        $VOObject = new VOObject(new stdClass);
        self::assertTrue(is_object($VOObject->getValue()));
        self::setExpectedException(InvalidTypeException::class);
        new VOObject('string');
    }
}
