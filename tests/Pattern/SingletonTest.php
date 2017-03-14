<?php namespace BestServedCold\PhalueObjects\Pattern;

use BestServedCold\PhalueObjects\TestCase;

class SingletonTest extends TestCase
{
    public function testUnique()
    {
        $singleton = Singleton::getInstance();
        self::assertInstanceOf(
            'BestServedCold\PhalueObjects\Pattern\Singleton',
            $singleton
        );
        self::assertEquals(
            $singleton,
            Singleton::getInstance()
        );
    }

    public function testConstructor()
    {
        self::assertTrue(
            (new \ReflectionObject(Singleton::getInstance()))
                ->getMethod('__construct')
                ->isPrivate()
        );
    }
}

