<?php

namespace BestServedCold\PhalueObjects\DateTime\Unit\Day;

use BestServedCold\PhalueObjects\Mathematical\Integer;
use BestServedCold\PhalueObjects\TestCase;

class YearTest extends TestCase
{
    public function testNow()
    {
        $this->assertSame((int) date('z'), Year::now()->getValue());
    }

    public function testToString()
    {
        $day = new Year(258);
        $this->assertEquals('258',  "$day");
    }

    public function testConstructor()
    {
        $this->setExpectedException(
            'BestServedCold\PhalueObjects\Exception\InvalidTypeException'
        );
        new Year(new Integer(450));
    }

    public function testFromNative()
    {
        $this->assertEquals(
            281,
            Year::fromNative((new \Datetime('2015-10-09')))->getValue()
        );
    }

    public function testFromString()
    {
        $this->assertEquals(281, Year::fromString('281')->getValue());
    }
}
