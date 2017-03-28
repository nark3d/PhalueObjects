<?php

namespace BestServedCold\PhalueObjects\Metric;

use BestServedCold\PhalueObjects\TestCase;

class PeakMemoryUsageTest extends TestCase
{
    public function testToString()
    {

        $now = PeakMemoryUsage::now();
        self::assertTrue(is_string($now->__toString()));
    }
}
