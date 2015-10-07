<?php

namespace BestServedCold\PhalueObjects\DateTime;

use BestServedCold\PhalueObjects\DateTime\Unit\Year;
use BestServedCold\PhalueObjects\TestCase;

class DateTest extends TestCase
{
    public function testGetYear()
    {
        $date = Date::fromString('2012-02-04');
        $this->assertInstanceOf('BestServedCold\PhalueObjects\DateTime\Unit\Year', $date->getYear());
        $this->assertEquals($date->getYear()->getValue(), 2012);
        $this->assertNotEquals($date->getYear()->getValue(), 2011);
    }

    public function testGetMonth()
    {
        $date = Date::fromString('2012-02-04');
        $this->assertInstanceOf('BestServedCold\PhalueObjects\DateTime\Unit\Month', $date->getMonth());
        $this->assertEquals($date->getMonth()->getValue(), 2);
        $this->assertNotEquals($date->getMonth()->getValue(), 3);
    }

    public function testGetDay()
    {
        $date = Date::fromString('2012-02-04');
        $this->assertInstanceOf('BestServedCold\PhalueObjects\DateTime\Unit\Day\Month', $date->getDay());
        $this->assertEquals($date->getDay()->getValue(), 4);
        $this->assertNotEquals($date->getDay()->getValue(), 3);
    }

    public function testGetTimestamp()
    {
        $date = Date::fromString('2012-02-04');

        $this->assertEquals(1328310000, $date->getTimestamp());
        $this->assertNotEquals($date->getTimestamp(), 22);
    }

    public function testIsWeekend()
    {
        $this->assertTrue(Date::fromString('2015-09-20')->isWeekend());
        $this->assertTrue(Date::fromString('2015-09-19')->isWeekend());
        $this->assertFalse(Date::fromString('2015-09-18')->isWeekend());
    }

    public function testIsWeekDay()
    {
        $this->assertFalse(Date::fromString('2015-09-20')->isWeekDay());
        $this->assertFalse(Date::fromString('2015-09-19')->isWeekDay());
        $this->assertTrue(Date::fromString('2015-09-18')->isWeekDay());
    }

    public function isLeap()
    {
        $this->assertEquals(
            (new Year(2012))->isLeap(),
            Date::fromString('2012-01-01')->isLeap()
        );
    }

    public function testIsBeforeToday()
    {
        $this->assertTrue(
            Date::fromNative((new \DateTime())->modify('-1 day'))->isBeforeToday()
        );

        $this->assertFalse(
            Date::fromNative((new \DateTime())->modify('1 day'))->isBeforeToday()
        );
    }

    public function testIsBeforeOrIsToday()
    {
        $this->assertTrue(
            Date::fromNative(new \DateTime())->isBeforeOrIsToday()
        );

        $this->assertTrue(
            Date::fromNative((new \DateTime())->modify('-1 day'))
                ->isBeforeOrIsToday()
        );

        $this->assertFalse(
            Date::fromNative((new \DateTime())->modify('+1 day'))
                ->isBeforeOrIsToday()
        );
    }

    public function testIsAfterToday()
    {
        $this->assertTrue(
            Date::fromNative((new \DateTime())->modify('1 day'))->isAfterToday()
        );

        $this->assertFalse(
            Date::fromNative((new \DateTime())->modify('-1 day'))->isAfterToday()
        );
    }

    public function testIsAfterOrIsToday()
    {
        $this->assertTrue(
            Date::fromNative(new \DateTime())->isBeforeOrIsToday()
        );

        $this->assertTrue(
            Date::fromNative((new \DateTime())->modify('-1 day'))
                ->isBeforeOrIsToday()
        );

        $this->assertFalse(
            Date::fromNative((new \DateTime())->modify('+1 day'))
                ->isBeforeOrIsToday()
        );
    }

    public function testNow()
    {
        $this->assertEquals(
            (new \DateTime())->setTime(0, 0),
            Date::now()->getNative()
        );

        $this->assertNotEquals(
            (new \DateTime())->modify('1 day')->setTime(0, 0),
            Date::now()->getNative()
        );
    }

    public function testAddDay()
    {
        $this->assertEquals(
            (new \DateTime())->setTime(0, 0, 0)->modify('1 day'),
            Date::now()->addDay(1)->getNative()
        );
        $this->assertNotEquals(
            (new \DateTime())->setTime(0, 0, 0)->modify('15 day'),
            Date::now()->addDay(1)->getNative()
        );
    }

    public function testIsLeap()
    {
        $this->assertTrue(Date::fromString('2012-01-01')->isLeap());
        $this->assertFalse(Date::fromString('2011-01-01')->isLeap());

    }
}
