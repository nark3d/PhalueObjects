<?php

namespace BestServedCold\PhalueObjects\Test\DateTime\Unit;

use BestServedCold\PhalueObjects\DateTime\Unit\Minute;
use BestServedCold\PhalueObjects\TestCase;

class MinuteTest extends TestCase
{
    public function testNow()
    {
        $this->assertSame((int) date('i'), Minute::now()->getValue());
    }

    public function testFromString()
    {
        $this->assertEquals(23, Minute::fromString('23')->getValue());
    }

    public function testFromNative()
    {
        $this->assertEquals(
            23,
            Minute::fromNative((new \Datetime('11:23:55')))->getValue()
        );
    }
}
