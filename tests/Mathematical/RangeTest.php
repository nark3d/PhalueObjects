<?php namespace BestServedCold\PhalueObjects\Mathematical;

use BestServedCold\PhalueObjects\TestCase;

class RangeTest extends TestCase
{
    public function testToString()
    {
        $this->assertEquals(
            "1, 10",
            (string) new Range(1, 10)
        );
    }
}
