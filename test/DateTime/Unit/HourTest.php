<?php namespace PhalueObjects\Test\DateTime\Unit;

use PhalueObjects\DateTime\Unit\Hour;
use PhalueObjects\Test\TestCase;

class HourTest extends TestCase
{
    public function testNow()
    {
        $this->assertSame(date('H'), Hour::now()->getValue());
    }
}
