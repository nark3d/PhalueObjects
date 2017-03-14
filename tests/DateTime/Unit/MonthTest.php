<?php

namespace BestServedCold\PhalueObjects\Test\DateTime\Unit;

use BestServedCold\PhalueObjects\DateTime\Unit\Month;
use BestServedCold\PhalueObjects\TestCase;

class MonthTest extends TestCase
{
    public function testNow()
    {
        self::assertSame((int) date('n'), Month::now()->getValue());
    }

    public function testFromString()
    {
        self::assertEquals(1, Month::fromString('01')->getValue());
        self::assertEquals(1, Month::fromString('January')->getValue());
        self::assertNotEquals(5, Month::fromString("0006")->getValue());
        self::assertNotEquals(7, Month::fromString('December')->getValue());
    }

    public function testFromNative()
    {
        self::assertEquals(
            11,
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
            12,
            Month::now()->getMaximum()
        );
    }
}
