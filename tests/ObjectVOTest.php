<?php

namespace BestServedCold\PhalueObjects;

use BestServedCold\PhalueObjects\Exception\InvalidTypeException;
use stdClass;

class ObjectVOTest extends TestCase
{
    public function testConstructor()
    {
        $objectVO = new ObjectVO(new stdClass);
        self::assertTrue(is_object($objectVO->getValue()));
        self::setExpectedException(InvalidTypeException::class);
        new ObjectVO('string');
    }
}
