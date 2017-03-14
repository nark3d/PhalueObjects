<?php

namespace BestServedCold\PhalueObjects\Test\DateTime\Unit;

use BestServedCold\PhalueObjects\DateTime\Unit\Year;
use BestServedCold\PhalueObjects\TestCase;

class YearTest extends TestCase
{
    public function testNow()
    {
        self::assertSame((int) date('Y'), Year::now()->getValue());
        self::assertNotSame(1999, Year::now()->getValue());
    }

    public function testLeap()
    {
        self::assertTrue((new Year(2012))->isLeap());
        self::assertFalse((new Year(2013))->isLeap());
    }

    public function testFromString()
    {
        $year = Year::fromString("2012");
        self::assertSame(2012, $year->getValue());
    }

    public function testFromNative()
    {
        self::assertEquals(
            2015,
            Year::fromNative((new \Datetime('2015-01-23')))->getValue()
        );
    }
}
