<?php namespace BestServedCold\PhalueObjects\Mathematical;

use BestServedCold\PhalueObjects\TestCase;

/**
 * Class RangeTest
 *
 * @package BestServedCold\PhalueObjects\Mathematical
 */
class RangeTest extends TestCase
{
    public function testToString()
    {
        self::assertEquals(
            "1, 10",
            (string) new Range(1, 10)
        );
    }
}
