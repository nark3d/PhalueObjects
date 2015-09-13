<?php namespace PhalueObjects\Test\Number;

use PhalueObjects\Number\Integer;
use PhalueObjects\Test\TestCase;

class IntegerTest extends TestCase
{
    public function testConstructor()
    {
        $integer = new Integer(7);
        $this->assertSame(7, $integer->getValue());
        $this->setExpectedException('PhalueObjects\Exception\InvalidTypeException');
        new Integer('this is the wrong type');
    }
}
