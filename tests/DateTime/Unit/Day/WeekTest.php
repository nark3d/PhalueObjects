<?php namespace BestServedCold\PhalueObjects\DateTime\Unit\Day;

use BestServedCold\PhalueObjects\Mathematical\Integer;
use BestServedCold\PhalueObjects\TestCase;

class WeekTest extends TestCase
{
    public function testNow()
    {
        $this->assertSame((int) date('N'), Week::now()->getValue());
    }

    public function testToString()
    {
        $day = new Week(3);
        $this->assertEquals("3",  "$day");
    }

    public function testConstructor()
    {
        $this->setExpectedException(
            'BestServedCold\PhalueObjects\Exception\InvalidTypeException'
        );
        new Week(new Integer(52));
    }
}

