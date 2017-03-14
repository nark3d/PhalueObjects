<?php

namespace BestServedCold\PhalueObjects\Metric;

use BestServedCold\PhalueObjects\TestCase;

class MicroTimeTest extends TestCase
{
    public function testNow()
    {
        $before = MicroTime::now();
        self::assertGreaterThan($before->count(), MicroTime::now()->count());
    }

    public function testToString()
    {
        $now = MicroTime::now();
        self::assertTrue(is_string((string) $now));
    }
}
