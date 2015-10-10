<?php namespace BestServedCold\PhalueObjects\Mathematical;

use BestServedCold\PhalueObjects\TestCase;

class ZeroPaddedIntegerTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertEquals(
            "000123",
            $this->reflect(new ZeroPaddedInteger(123, 3))->value
        );
    }
}
