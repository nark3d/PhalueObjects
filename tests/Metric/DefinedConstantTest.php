<?php

namespace BestServedCold\PhalueObjects\Metric;

use BestServedCold\PhalueObjects\TestCase;

class DefinedConstantTest extends TestCase
{
    public function testNow()
    {
        $before = DefinedConstant::now();
        define('BOB', 'mary');
        self::assertGreaterThan($before->count(), DefinedConstant::now()->count());
    }

    public function testToString()
    {
        $before = DefinedConstant::now();
        define('SUSAN', 'harry');
        self::assertEquals("SUSAN=harry", (string) DefinedConstant::now()->diff($before));
    }
}
