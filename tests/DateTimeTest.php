<?php namespace BestServedCold\PhalueObjects;

class DateTimeTest extends TestCase
{
    public function testGetDate()
    {
        $dateTime = DateTime::fromString('2013-06-02 09:22:44');
        $this->assertInstanceOf('BestServedCold\PhalueObjects\DateTime\Date', $dateTime->getDate());
        $this->assertEquals('2013-06-02', $dateTime->getDate());
    }

    public function testGetTime()
    {
        $dateTime = DateTime::fromString('2013-06-02 09:22:44');
        $this->assertInstanceOf('BestServedCold\PhalueObjects\DateTime\Time', $dateTime->getTime());
        $this->assertEquals('09:22:44', $dateTime->getTime());

    }

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

    public function testYesterday()
    {
        $this->assertEquals(
            (new \DateTime())->modify('-1 day'),
            DateTime::yesterday()->getNative()
        );
        $this->assertNotEquals(
            (new \DateTime())->modify('15 day'),
            DateTime::yesterday()->getNative()
        );
    }
}
