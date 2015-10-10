<?php

namespace BestServedCold\PhalueObjects\Test\DateTime\Unit;

use BestServedCold\PhalueObjects\DateTime\Unit\Hour;
use BestServedCold\PhalueObjects\TestCase;

class HourTest extends TestCase
{
    public function testNow()
    {
        $this->assertEquals((int) date('H'), Hour::now()->getValue());
    }

    public function testFromString()
    {
        $this->assertEquals(23, Hour::fromString('23')->getValue());
    }

    public function testFromNative()
    {
        $this->assertEquals(
            11,
            Hour::fromNative((new \Datetime('11:23:55')))->getValue()
        );
    }

    public function testGetMinimum()
    {
        $this->assertEquals(
            0,
            Hour::now()->getMinimum()
        );
    }

    public function testGetMaximum()
    {
        $this->assertEquals(
            23,
            Hour::now()->getMaximum()
        );
    }
}
