<?php namespace BestServedCold\PhalueObjects\Internet;

use BestServedCold\PhalueObjects\TestCase;

class URITest extends TestCase
{
    public function testConstructor()
    {
        $URI = new URI('http://bestservedcold.com');
        $this->assertSame('http://bestservedcold.com', $URI->getValue());
        $this->setExpectedException(
            'BestServedCold\PhalueObjects\Exception\InvalidTypeException'
        );
        new URI('this is definitely not a URI!');
    }
}