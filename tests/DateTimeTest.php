<?php namespace BestServedCold\PhalueObjects;

class DateTimeTest extends TestCase
{
    public function testGetNative()
    {
        $this->assertEquals(
            new \DateTime('2013-04-01 11:23:22'),
            DateTime::fromString('2013-04-01 11:23:22')->getNative()
        );
    }

    public function testGetValue()
    {
        $this->assertEquals(
            (new \DateTime('2013-04-01 11:23:22'))->getTimestamp(),
            DateTime::fromString('2013-04-01 11:23:22')->getValue()
        );
    }

    public function testNow()
    {
        $this->assertEquals(
            new \DateTime,
            DateTime::now()->getNative()
        );
    }

    public function testToString()
    {
        $dateTime = DateTime::fromString('2013-04-01 01:03:02');
        $this->assertEquals(
            '2013-04-01 01:03:02',
            "$dateTime"
        );
    }

    public function testAddDay()
    {
        $this->assertEquals(
            (new \DateTime())->modify('1 day'),
            DateTime::now()->addDay(1)->getNative()
        );
        $this->assertNotEquals(
            (new \DateTime())->modify('15 day'),
            DateTime::now()->addDay(1)->getNative()
        );
    }

    public function testTomorrow()
    {
        $this->assertEquals(
            (new \DateTime())->modify('1 day'),
            DateTime::tomorrow()->getNative()
        );
        $this->assertNotEquals(
            (new \DateTime())->modify('15 day'),
            DateTime::tomorrow()->getNative()
        );
    }
}