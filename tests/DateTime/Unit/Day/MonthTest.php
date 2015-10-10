<?php

namespace BestServedCold\PhalueObjects\DateTime\Unit\Day;

use BestServedCold\PhalueObjects\Mathematical\Integer;
use BestServedCold\PhalueObjects\TestCase;

class MonthTest extends TestCase
{
    public function testNow()
    {
        $this->assertSame((int) date('j'), Month::now()->getValue());
    }

    public function testToString()
    {
        $day = new Month(8);
        $this->assertEquals('8',  "$day");
    }

    public function testConstructor()
    {
        $this->setExpectedException(
            'BestServedCold\PhalueObjects\Exception\InvalidTypeException'
        );
        new Month(new Integer(52));
    }

    public function testFromString()
    {
        $this->assertEquals(1, Month::fromString('01')->getValue());
        $this->assertNotEquals(5, Month::fromString("0006")->getValue());
    }

    public function testFromNative()
    {
        $this->assertEquals(
            23,
            Month::fromNative((new \Datetime('2015-11-23')))->getValue()
        );
        $this->assertNotEquals(
            4,
            Month::fromNative((new \DateTime('2015-11-23')))->getValue()
        );
    }

    public function testGetMinimum()
    {
        $this->assertEquals(
            1,
            Month::now()->getMinimum()
        );
    }

    public function testGetMaximum()
    {
        $this->assertEquals(
            31,
            Month::now()->getMaximum()
        );
    }
}
