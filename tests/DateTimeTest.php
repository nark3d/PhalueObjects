<?php namespace BestServedCold\PhalueObjects;

/**
 * Class DateTimeTest
 *
 * @package BestServedCold\PhalueObjects
 */
class DateTimeTest extends TestCase
{
    public function testGetDate()
    {
        $dateTime = DateTime::fromString('2013-06-02 09:22:44');
        self::assertInstanceOf(
            'BestServedCold\PhalueObjects\DateTime\Date',
                $dateTime->getDate()
        );
        self::assertEquals('2013-06-02', $dateTime->getDate());
    }

    public function testGetTime()
    {
        $dateTime = DateTime::fromString('2013-06-02 09:22:44');
        self::assertInstanceOf('BestServedCold\PhalueObjects\DateTime\Time', $dateTime->getTime());
        self::assertEquals('09:22:44', $dateTime->getTime());
    }

    public function testGetNative()
    {
        self::assertEquals(
            new \DateTime('2013-04-01 11:23:22'),
            DateTime::fromString('2013-04-01 11:23:22')->getNative()
        );
    }

    public function testGetValue()
    {
        self::assertEquals(
            (new \DateTime('2013-04-01 11:23:22'))->getTimestamp(),
            DateTime::fromString('2013-04-01 11:23:22')->getValue()
        );
    }

    public function testNow()
    {
        self::assertEquals(new \DateTime, DateTime::now()->getNative());
    }

    public function testToString()
    {
        $dateTime = DateTime::fromString('2013-04-01 01:03:02');
        self::assertEquals(
            '2013-04-01 01:03:02',
            "$dateTime"
        );
    }

    public function testAddDay()
    {
        self::assertEquals(
            (new \DateTime())->modify('1 day'),
            DateTime::now()->addDay(1)->getNative()
        );
        self::assertNotEquals(
            (new \DateTime())->modify('15 day'),
            DateTime::now()->addDay(1)->getNative()
        );
    }

    public function testTomorrow()
    {
        self::assertEquals(
            (new \DateTime())->modify('1 day'),
            DateTime::tomorrow()->getNative()
        );
        self::assertNotEquals(
            (new \DateTime())->modify('15 day'),
            DateTime::tomorrow()->getNative()
        );
    }

    public function testYesterday()
    {
        self::assertEquals(
            (new \DateTime())->modify('-1 day'),
            DateTime::yesterday()->getNative()
        );
        self::assertNotEquals(
            (new \DateTime())->modify('15 day'),
            DateTime::yesterday()->getNative()
        );
    }

    public function testFromTimestamp()
    {
        self::assertEquals(
            (new \DateTime())->setTimestamp(1444389424),
            DateTime::fromTimestamp(1444389424)->getNative()
        );
        self::assertNotEquals(
            '2015-10-10 12:00:00',
            (string) DateTime::fromTimestamp(1444389424)
        );
    }
}
