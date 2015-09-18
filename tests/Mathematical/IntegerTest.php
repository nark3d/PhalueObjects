<?php namespace BestServedCold\PhalueObjects\Mathematical;

use BestServedCold\PhalueObjects\Mathematical\Integer;
use BestServedCold\PhalueObjects\TestCase;

class IntegerTest extends TestCase
{
    public function testConstructor()
    {
        $integer = new Integer(7);
        $this->assertSame(7, $integer->getValue());
        $this->setExpectedException('BestServedCold\PhalueObjects\Exception\InvalidTypeException');
        new Integer('this is the wrong type');
    }


}
