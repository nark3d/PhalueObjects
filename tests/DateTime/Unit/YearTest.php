<?php namespace BestServedCold\PhalueObjects\Test\DateTime\Unit;

use BestServedCold\PhalueObjects\DateTime\Unit\Year;
use BestServedCold\PhalueObjects\TestCase;

class YearTest extends TestCase
{
    public function testNow()
    {
        $this->assertSame(date('Y'), Year::now()->getValue());
    }
}
