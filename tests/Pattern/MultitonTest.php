<?php namespace BestServedCold\PhalueObjects\Pattern;

use BestServedCold\PhalueObjects\Pattern\Singleton\Multiton;
use BestServedCold\PhalueObjects\TestCase;

class MultitonTest extends TestCase
{
    public function testUnique()
    {
        $singleton = Multiton::getInstance();
        $this->assertInstanceOf(
            'BestServedCold\PhalueObjects\Pattern\Singleton\Multiton',
            $singleton
        );
        $this->assertEquals(
            $singleton,
            Multiton::getInstance()
        );
    }

    public function testConstructor()
    {
        $this->assertTrue(
            (new \ReflectionObject(Multiton::getInstance()))
                ->getMethod('__construct')
                ->isPrivate()
        );
    }
}
