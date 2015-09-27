<?php

namespace BestServedCold\PhalueObjects\Test\DateTime\Unit;

use BestServedCold\PhalueObjects\DateTime\Unit\Year;
use BestServedCold\PhalueObjects\TestCase;

class YearTest extends TestCase
{
    public function testNow()
    {
        $this->assertSame((int) date('Y'), Year::now()->getValue());
        $this->assertNotSame(1999, Year::now()->getValue());
    }

    public function testLeap()
    {
        $this->assertTrue((new Year(2012))->isLeap());
        $this->assertFalse((new Year(2013))->isLeap());
    }
}
