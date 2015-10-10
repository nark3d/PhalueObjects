<?php namespace BestServedCold\PhalueObjects\Mathematical;

use BestServedCold\PhalueObjects\TestCase;

class FloatVOTest extends TestCase
{
    public function testConstructor()
    {
        $integer = new FloatVO(7.12001);
        $this->assertSame(7.12001, $integer->getValue());
        $this->setExpectedException(
            'BestServedCold\PhalueObjects\Exception\InvalidTypeException'
        );
        new FloatVO('this is the wrong type');
    }

    public function testRound()
    {
        $float = new FloatVO(1.123456);
        $this->assertEquals(
            1.12,
            $float->round(1.123456, 2)
        );
    }
}
