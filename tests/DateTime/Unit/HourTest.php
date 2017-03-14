<?php

namespace BestServedCold\PhalueObjects\Test\DateTime\Unit;

use BestServedCold\PhalueObjects\DateTime\Unit\Hour;
use BestServedCold\PhalueObjects\TestCase;

class HourTest extends TestCase
{
    public function testNow()
    {
        self::assertEquals((int) date('H'), Hour::now()->getValue());
    }

    public function testFromString()
    {
        self::assertEquals(23, Hour::fromString('23')->getValue());
    }

    public function testFromNative()
    {
        self::assertEquals(
            11,
            Hour::fromNative((new \Datetime('11:23:55')))->getValue()
        );
    }

    public function testGetMinimum()
    {
        self::assertEquals(
            0,
            Hour::now()->getMinimum()
        );
    }

    public function testGetMaximum()
    {
        self::assertEquals(
            23,
            Hour::now()->getMaximum()
        );
    }
}
