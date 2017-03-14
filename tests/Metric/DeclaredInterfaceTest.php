<?php

namespace BestServedCold\PhalueObjects\Metric;

use BestServedCold\PhalueObjects\TestCase;

class DeclaredInterfaceTest extends TestCase
{
    public function testNow()
    {
        $before = DeclaredInterface::now();
        require_once(__DIR__ . '/SomeInterface.php');
        self::assertGreaterThan($before->count(), DeclaredInterface::now()->count());
    }
}
