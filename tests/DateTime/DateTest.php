<?php

namespace BestServedCold\PhalueObjects\DateTime;

use BestServedCold\PhalueObjects\DateTime\Unit\Year;
use BestServedCold\PhalueObjects\TestCase;

class DateTest extends TestCase
{
    public function testGetYear()
    {
        $date = Date::fromString('2012-02-04');
        self::assertInstanceOf(
            'BestServedCold\PhalueObjects\DateTime\Unit\Year',
            $date->getYear()
        );
        self::assertEquals($date->getYear()->getValue(), 2012);
        self::assertNotEquals($date->getYear()->getValue(), 2011);
    }

    public function testGetMonth()
    {
        $date = Date::fromString('2012-02-04');
        self::assertInstanceOf(
            'BestServedCold\PhalueObjects\DateTime\Unit\Month',
            $date->getMonth()
        );
        self::assertEquals($date->getMonth()->getValue(), 2);
        self::assertNotEquals($date->getMonth()->getValue(), 3);
    }

    public function testGetDay()
    {
        $date = Date::fromString('2012-02-04');
        self::assertInstanceOf(
            'BestServedCold\PhalueObjects\DateTime\Unit\Day\Month',
            $date->getDay()
        );
        self::assertEquals($date->getDay()->getValue(), 4);
        self::assertNotEquals($date->getDay()->getValue(), 3);
    }

    public function testGetTimestamp()
    {
        $date = Date::fromString('2012-02-04');

        self::assertEquals(1328313600, $date->getTimestamp());
        self::assertNotEquals($date->getTimestamp(), 22);
    }

    public function testFromTimestamp()
    {
        $date = Date::fromTimestamp(1444330290);
        self::assertEquals('2015-10-08', "$date");
    }

    public function testIsWeekend()
    {
        self::assertTrue(Date::fromString('2015-09-20')->isWeekend());
        self::assertTrue(Date::fromString('2015-09-19')->isWeekend());
        self::assertFalse(Date::fromString('2015-09-18')->isWeekend());
    }

    public function testIsWeekDay()
    {
        self::assertFalse(Date::fromString('2015-09-20')->isWeekDay());
        self::assertFalse(Date::fromString('2015-09-19')->isWeekDay());
        self::assertTrue(Date::fromString('2015-09-18')->isWeekDay());
    }

    public function isLeap()
    {
        self::assertEquals(
            (new Year(2012))->isLeap(),
            Date::fromString('2012-01-01')->isLeap()
        );
    }

    public function testIsBeforeToday()
    {
        self::assertTrue(
            Date::fromNative((new \DateTime())->modify('-1 day'))->isBeforeToday()
        );

        self::assertFalse(
            Date::fromNative((new \DateTime())->modify('1 day'))->isBeforeToday()
        );
    }

    public function testIsBeforeOrIsToday()
    {
        self::assertTrue(
            Date::fromNative(new \DateTime())->isBeforeOrIsToday()
        );

        self::assertTrue(
            Date::fromNative((new \DateTime())->modify('-1 day'))
                ->isBeforeOrIsToday()
        );

        self::assertFalse(
            Date::fromNative((new \DateTime())->modify('+1 day'))
                ->isBeforeOrIsToday()
        );
    }

    public function testIsAfterToday()
    {
        self::assertTrue(
            Date::fromNative((new \DateTime())->modify('1 day'))->isAfterToday()
        );

        self::assertFalse(
            Date::fromNative((new \DateTime())->modify('-1 day'))->isAfterToday()
        );
    }

    public function testIsAfterOrIsToday()
    {
        self::assertTrue(
            Date::fromNative((new \DateTime())->modify('1 day'))->isAfterOrIsToday()
        );

        self::assertFalse(
            Date::fromNative((new \DateTime())->modify('-1 day'))
                ->isAfterOrIsToday()
        );

        self::assertFalse(
            Date::fromNative((new \DateTime())->modify('-1 day'))
                ->isAfterOrIsToday()
        );
    }

    public function testNow()
    {
        self::assertEquals(
            (new \DateTime())->setTime(0, 0),
            Date::now()->getNative()
        );

        self::assertNotEquals(
            (new \DateTime())->modify('1 day')->setTime(0, 0),
            Date::now()->getNative()
        );
    }

    public function testAddDay()
    {
        self::assertEquals(
            (new \DateTime())->setTime(0, 0, 0)->modify('1 day'),
            Date::now()->addDay(1)->getNative()
        );
        self::assertNotEquals(
            (new \DateTime())->setTime(0, 0, 0)->modify('15 day'),
            Date::now()->addDay(1)->getNative()
        );
    }

    public function testIsLeap()
    {
        self::assertTrue(Date::fromString('2012-01-01')->isLeap());
        self::assertFalse(Date::fromString('2011-01-01')->isLeap());

    }
}
