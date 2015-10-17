<?php namespace BestServedCold\PhalueObjects\Pattern;

use BestServedCold\PhalueObjects\TestCase;

class SingletonTest extends TestCase
{
    public function testUnique()
    {
        $singleton = Singleton::getInstance();
        $this->assertInstanceOf(
            'BestServedCold\PhalueObjects\Pattern\Singleton',
            $singleton
        );
        $this->assertEquals(
            $singleton,
            Singleton::getInstance()
        );

        $singleton->destroy();
    }

    public function testConstructor()
    {
        $this->assertTrue(
            (new \ReflectionObject(Singleton::getInstance()))
                ->getMethod('__construct')
                ->isPrivate()
        );

        Singleton::getInstance()->destroy();
    }
}
