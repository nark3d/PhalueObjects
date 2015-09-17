<?php namespace BestServedCold\PhalueObjects\DateTime\Day\Unit;

use BestServedCold\PhalueObjects\DateTime\Unit\Day;
use BestServedCold\PhalueObjects\Mathematical\Integer;
use BestServedCold\PhalueObjects\TestCase;

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

    public function testConstructor()
    {
        $this->setExpectedException('BestServedCold\PhalueObjects\Exception\InvalidTypeException');
        new Day(new Integer(52));
    }
}
