<?php

namespace BestServedCold\PhalueObjects\Metric;

use BestServedCold\PhalueObjects\TestCase;

class MemoryUsageTest extends TestCase
{
    public function testNow()
    {
        $before = MemoryUsage::now();
        self::assertGreaterThan($before->count(), MemoryUsage::now()->count());
    }

    public function testToString()
    {
        $now = MemoryUsage::now();
        self::assertTrue(is_string((string) $now));
    }
}
