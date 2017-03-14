<?php

namespace BestServedCold\PhalueObjects\DateTime;

use BestServedCold\PhalueObjects\TestCase;

class TimeTest extends TestCase
{
    public function testGetHour()
    {
        $date = Time::fromString('15:22:32');
        self::assertInstanceOf(
            'BestServedCold\PhalueObjects\DateTime\Unit\Hour',
            $date->getHour()
        );
        self::assertEquals(15, $date->getHour()->getValue());
        self::assertNotEquals(2011, $date->getHour()->getValue());
    }

    public function testGetMinute()
    {
        $date = Time::fromString('15:22:32');
        self::assertInstanceOf(
            'BestServedCold\PhalueObjects\DateTime\Unit\Minute',
            $date->getMinute()
        );
        self::assertEquals(22, $date->getMinute()->getValue());
        self::assertNotEquals(3, $date->getMinute()->getValue());
    }

    public function testGetSecond()
    {
        $date = Time::fromString('15:22:32');
        self::assertInstanceOf(
            'BestServedCold\PhalueObjects\DateTime\Unit\Second',
            $date->getSecond()
        );
        self::assertEquals(32, $date->getSecond()->getValue());
        self::assertNotEquals(3, $date->getSecond()->getValue());
    }
    public function testFromString()
    {
        self::assertEquals('14:22:55', Time::fromString('14:22:55'));
    }

    public function testNow()
    {
        self::assertEquals(date('H:i:s'), Time::now());
    }


    public function testGetTimestamp()
    {
        self::assertEquals(
            (time() - strtotime('today')),
            Time::now()->getTimestamp()
        );
        self::assertNotEquals(1, Time::now()->getTimestamp());
    }

    public function testGetValue()
    {
        self::assertEquals(
            (time() - strtotime('today')),
            Time::now()->getValue()
        );
        self::assertNotEquals(1, Time::now()->getValue());
    }
}
