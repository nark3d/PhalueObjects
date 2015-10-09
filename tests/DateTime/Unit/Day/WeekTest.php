<?php

namespace BestServedCold\PhalueObjects\DateTime\Unit\Day;

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
        $this->assertEquals('3',  "$day");
    }

    public function testConstructor()
    {
        $this->setExpectedException(
            'BestServedCold\PhalueObjects\Exception\InvalidTypeException'
        );
        new Week(new Integer(52));
    }

    public function testFromString()
    {
        $this->assertEquals(1, Week::fromString('01')->getValue());
        $this->assertEquals(6, Week::fromString('Saturday')->getValue());
        $this->assertNotEquals(5, Week::fromString("0006")->getValue());
        $this->assertNotEquals(5, Week::fromString('Sunday')->getValue());
    }

    public function fromNative()
    {
        $this->assertEquals(
            4,
            Week::fromNative((new \Datetime('2015-10-09')))->getValue()
        );
        $this->assertNotEquals(
            1,
            Week::fromNative((new \DateTime('2015-10-09')))->getValue()
        );
    }

}
