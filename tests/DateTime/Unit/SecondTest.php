<?php

namespace BestServedCold\PhalueObjects\Test\DateTime\Unit;

use BestServedCold\PhalueObjects\DateTime\Unit\Second;
use BestServedCold\PhalueObjects\TestCase;

class SecondTest extends TestCase
{
    public function testNow()
    {
        $this->assertSame((int) date('s'), Second::now()->getValue());
    }

    public function testFromString()
    {
        $this->assertEquals(23, Second::fromString('23')->getValue());
    }

    public function testFromNative()
    {
        $this->assertEquals(
            55,
            Second::fromNative((new \Datetime('11:23:55')))->getValue()
        );
    }

    public function testGetMinimum()
    {
        $this->assertEquals(
            0,
            Second::now()->getMinimum()
        );
    }

    public function testGetMaximum()
    {
        $this->assertEquals(
            59,
            Second::now()->getMaximum()
        );
    }
}
