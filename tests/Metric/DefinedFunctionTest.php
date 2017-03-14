<?php

namespace BestServedCold\PhalueObjects\Metric;

use BestServedCold\PhalueObjects\TestCase;

class DefinedFunctionTest extends TestCase
{
    public function testNow()
    {
        $before = DefinedFunction::now();
        require_once(__DIR__ . '/SomeFunction.php');
        self::assertGreaterThan($before->count(), DefinedFunction::now()->count());
    }
}
