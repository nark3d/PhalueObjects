<?php

namespace BestServedCold\PhalueObjects\Metric;

use BestServedCold\PhalueObjects\TestCase;

class MemoryUsageTest extends TestCase
{
    public function testNow()
    {
        $before = MemoryUsage::now();
        self::assertTrue(is_integer($before->count()));
    }

    public function testToString()
    {
        $now = MemoryUsage::now();
        self::assertTrue(is_string((string) $now));
    }
}
