<?php namespace PhalueObjects\Test\DateTime\Unit;

use PhalueObjects\DateTime\Unit\Day;
use PhalueObjects\Test\TestCase;

class DayTest extends TestCase
{
    public function testNow()
    {
        $this->assertSame(date('d'), Day::now()->getValue());
    }

    public function testToString()
    {
        $day = new Day(8);
        $this->assertEquals(8,  "$day");
    }
}
