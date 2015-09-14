<?php namespace PhalueObjects\Test\DateTime\Unit;

use PhalueObjects\DateTime\Unit\Month;
use PhalueObjects\Test\TestCase;

class MonthTest extends TestCase
{
    public function testNow()
    {
        $this->assertSame(date('m'), Month::now()->getValue());
    }
}
