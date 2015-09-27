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


}