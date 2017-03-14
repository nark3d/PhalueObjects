<?php

namespace BestServedCold\PhalueObjects\Test\DateTime\Unit;

use BestServedCold\PhalueObjects\DateTime\Unit\Minute;
use BestServedCold\PhalueObjects\TestCase;

class MinuteTest extends TestCase
{
    public function testNow()
    {
        self::assertSame((int) date('i'), Minute::now()->getValue());
    }

    public function testFromString()
    {
        self::assertEquals(23, Minute::fromString('23')->getValue());
    }

    public function testFromNative()
    {
        self::assertEquals(
            23,
            Minute::fromNative((new \Datetime('11:23:55')))->getValue()
        );
    }

    public function testGetMinimum()
    {
        self::assertEquals(
            0,
            Minute::now()->getMinimum()
        );
    }

    public function testGetMaximum()
    {
        self::assertEquals(
            59,
            Minute::now()->getMaximum()
        );
    }
}
