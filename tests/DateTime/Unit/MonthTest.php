<?php

namespace BestServedCold\PhalueObjects\Test\DateTime\Unit;

use BestServedCold\PhalueObjects\DateTime\Unit\Month;
use BestServedCold\PhalueObjects\TestCase;

class MonthTest extends TestCase
{
    public function testNow()
    {
        $this->assertSame((int) date('n'), Month::now()->getValue());
    }

    public function testFromString()
    {
        $this->assertEquals(1, Month::fromString('01')->getValue());
        $this->assertEquals(1, Month::fromString('January')->getValue());
        $this->assertNotEquals(5, Month::fromString("0006")->getValue());
        $this->assertNotEquals(7, Month::fromString('December')->getValue());
    }

    public function testFromNative()
    {
        $this->assertEquals(
            11,
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
            12,
            Month::now()->getMaximum()
        );
    }
}
