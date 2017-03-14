<?php namespace BestServedCold\PhalueObjects;

class FinanceTest extends TestCase
{
    public function testToString()
    {
        self::assertEquals(
            "2.34",
            (string) new Finance(2.34)
        );
    }
}
