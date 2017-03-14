<?php namespace BestServedCold\PhalueObjects\Internet;

use BestServedCold\PhalueObjects\TestCase;

class EmailTest extends TestCase
{
    public function testConstructor()
    {
        $email = new Email('adam.lewis@bestservedcold.com');

        self::assertSame('adam.lewis@bestservedcold.com', $email->getValue());
        $this->setExpectedException(
            'BestServedCold\PhalueObjects\Exception\InvalidTypeException'
        );
        new Email('this is the wrong type');
    }
}
