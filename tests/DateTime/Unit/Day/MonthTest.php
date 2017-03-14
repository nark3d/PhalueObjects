<?php

namespace BestServedCold\PhalueObjects\DateTime\Unit\Day;

use BestServedCold\PhalueObjects\Mathematical\Integer;
use BestServedCold\PhalueObjects\TestCase;

class MonthTest extends TestCase
{
    public function testNow()
    {
        self::assertSame((int) date('j'), Month::now()->getValue());
    }

    public function testToString()
    {
        $day = new Month(8);
        self::assertEquals('8',  "$day");
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
        self::assertEquals(1, Month::fromString('01')->getValue());
        self::assertNotEquals(5, Month::fromString("0006")->getValue());
    }

    public function testFromNative()
    {
        self::assertEquals(
            23,
            Month::fromNative((new \Datetime('2015-11-23')))->getValue()
        );
        self::assertNotEquals(
            4,
            Month::fromNative((new \DateTime('2015-11-23')))->getValue()
        );
    }

    public function testGetMinimum()
    {
        self::assertEquals(
            1,
            Month::now()->getMinimum()
        );
    }

    public function testGetMaximum()
    {
        self::assertEquals(
            31,
            Month::now()->getMaximum()
        );
    }
}
