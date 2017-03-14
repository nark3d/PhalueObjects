<?php

namespace BestServedCold\PhalueObjects\Mathematical;

use BestServedCold\PhalueObjects\TestCase;

class IntegerTest extends TestCase
{
    public function testConstructor()
    {
        $integer = new Integer(7);
        self::assertSame(7, $integer->getValue());
        $this->setExpectedException('BestServedCold\PhalueObjects\Exception\InvalidTypeException');
        new Integer('this is the wrong type');
    }
}
