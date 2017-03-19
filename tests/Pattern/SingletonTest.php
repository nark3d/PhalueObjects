<?php namespace BestServedCold\PhalueObjects\Pattern;

use BestServedCold\PhalueObjects\TestCase;

/**
 * Class SingletonTest
 *
 * @package BestServedCold\PhalueObjects\Pattern
 */
class SingletonTest extends TestCase
{
    public function testUnique()
    {
        $singleton = Singleton::getInstance();
        self::assertInstanceOf(
            Singleton::class,
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

    public function testDestroy()
    {
        self::assertNull(Singleton::destroy());
    }

    public function testDestroyInstance()
    {
        self::assertNull(Singleton::destroyInstance(Singleton::class));
    }
}

