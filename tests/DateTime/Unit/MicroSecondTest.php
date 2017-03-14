<?php namespace BestServedCold\PhalueObjects\DateTime\Unit;

use BestServedCold\PhalueObjects\TestCase;

class MicroSecondTest extends TestCase
{
    /**
     * Test Now
     *
     * Can't really test microseconds... So we'll make sure it's returning the right
     * object and test getMilliTime instead.
     */
    public function testNow()
    {
        self::assertInstanceOf(
            'BestServedCold\PhalueObjects\DateTime\Unit\MicroSecond',
            MicroSecond::now()
        );
    }

    public function testFromString()
    {
        self::assertEquals(
            0.12312412424,
            MicroSecond::fromString('0.12312412424')->getValue()
        );
    }

    public function testFromNative()
    {
        self::assertEquals(
            0.123456,
            MicroSecond::fromNative(
                new \DateTime('2015-10-09 18:13:22.123456')
            )->getValue()
        );
    }

    public function testGetMicroTimeAsInteger()
    {
        $microTime = microtime();
        self::assertEquals(
            explode(' ', $microTime)[0],
            MicroSecond::getMicroTimeAsInteger($microTime)
        );
    }
}
