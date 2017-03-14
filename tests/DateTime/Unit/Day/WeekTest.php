<?php

namespace BestServedCold\PhalueObjects\DateTime\Unit\Day;

use BestServedCold\PhalueObjects\Mathematical\Integer;
use BestServedCold\PhalueObjects\TestCase;

class WeekTest extends TestCase
{
    public function testNow()
    {
        self::assertSame((int) date('N'), Week::now()->getValue());
    }

    public function testToString()
    {
        $day = new Week(3);
        self::assertEquals('3',  "$day");
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
        self::assertEquals(1, Week::fromString('01')->getValue());
        self::assertEquals(6, Week::fromString('Saturday')->getValue());
        self::assertNotEquals(5, Week::fromString("0006")->getValue());
        self::assertNotEquals(5, Week::fromString('Sunday')->getValue());
    }

    public function fromNative()
    {
        self::assertEquals(
            4,
            Week::fromNative((new \Datetime('2015-10-09')))->getValue()
        );
        self::assertNotEquals(
            1,
            Week::fromNative((new \DateTime('2015-10-09')))->getValue()
        );
    }

    public function testGetMinimum()
    {
        self::assertEquals(
            1,
            Week::now()->getMinimum()
        );
    }

    public function testGetMaximum()
    {
        self::assertEquals(
            7,
            Week::now()->getMaximum()
        );
    }
}
