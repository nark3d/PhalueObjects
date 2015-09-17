<?php namespace BestServedCold\PhalueObjects\Test\DateTime\Unit;

use BestServedCold\PhalueObjects\DateTime\Unit\Hour;
use BestServedCold\PhalueObjects\TestCase;

class HourTest extends TestCase
{
    public function testNow()
    {
        $this->assertSame(date('H'), Hour::now()->getValue());
    }
}
