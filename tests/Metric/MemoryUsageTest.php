<?php

namespace BestServedCold\PhalueObjects\Metric;

use BestServedCold\PhalueObjects\TestCase;

/**
 * Class MemoryUsageTest
 *
 * @package BestServedCold\PhalueObjects\Metric
 */
class MemoryUsageTest extends TestCase
{
    public function testNow()
    {
        $before = MemoryUsage::now();
        self::assertTrue(is_float($before->count()));
    }

    public function testToString()
    {
        $now = MemoryUsage::now();
        self::assertTrue(is_string($now->__toString()));
    }
}
