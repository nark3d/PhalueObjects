<?php

namespace BestServedCold\PhalueObjects\DateTime;

use BestServedCold\PhalueObjects\TestCase;

class TimeTest extends TestCase
{
    public function testGetHour()
    {
        $date = Time::fromString('15:22:32');
        $this->assertInstanceOf(
            'BestServedCold\PhalueObjects\DateTime\Unit\Hour',
            $date->getHour()
        );
        $this->assertEquals(15, $date->getHour()->getValue());
        $this->assertNotEquals(2011, $date->getHour()->getValue());
    }

    public function testGetMinute()
    {
        $date = Time::fromString('15:22:32');
        $this->assertInstanceOf(
            'BestServedCold\PhalueObjects\DateTime\Unit\Minute',
            $date->getMinute()
        );
        $this->assertEquals(22, $date->getMinute()->getValue());
        $this->assertNotEquals(3, $date->getMinute()->getValue());
    }

    public function testGetSecond()
    {
        $date = Time::fromString('15:22:32');
        $this->assertInstanceOf(
            'BestServedCold\PhalueObjects\DateTime\Unit\Second',
            $date->getSecond()
        );
        $this->assertEquals(32, $date->getSecond()->getValue());
        $this->assertNotEquals(3, $date->getSecond()->getValue());
    }
    public function testFromString()
    {
        $this->assertEquals('14:22:55',Time::fromString('14:22:55'));
    }

    public function testNow()
    {
        $this->assertEquals(date('H:i:s'), Time::now());
    }

    public function testFromNative()
    {
//        $this->assert
    }

    public function testGetTimestamp()
    {
        $this->assertEquals(
            (time() - strtotime('today')),
            Time::now()->getTimestamp()
        );
        $this->assertNotEquals(1, Time::now()->getTimestamp());
    }

    public function testGetValue()
    {
        $this->assertEquals(
            (time() - strtotime('today')),
            Time::now()->getValue()
        );
        $this->assertNotEquals(1, Time::now()->getValue());
    }
}
