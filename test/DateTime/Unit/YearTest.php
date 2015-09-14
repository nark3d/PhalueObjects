<?php namespace PhalueObjects\Test\DateTime\Unit;

use PhalueObjects\DateTime\Unit\Year;
use PhalueObjects\Test\TestCase;

class YearTest extends TestCase
{
    public function testNow()
    {
        $this->assertSame(date('Y'), Year::now()->getValue());
    }
}
