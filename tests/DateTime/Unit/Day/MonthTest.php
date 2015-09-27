<?php

namespace BestServedCold\PhalueObjects\DateTime\Unit\Day;

use BestServedCold\PhalueObjects\Mathematical\Integer;
use BestServedCold\PhalueObjects\TestCase;

class MonthTest extends TestCase
{
    public function testNow()
    {
        $this->assertSame((int) date('j'), Month::now()->getValue());
    }

    public function testToString()
    {
        $day = new Month(8);
        $this->assertEquals('8',  "$day");
    }

    public function testConstructor()
    {
        $this->setExpectedException(
            'BestServedCold\PhalueObjects\Exception\InvalidTypeException'
        );
        new Month(new Integer(52));
    }
}
