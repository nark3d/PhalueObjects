<?php

namespace BestServedCold\PhalueObjects\Metric;

use BestServedCold\PhalueObjects\TestCase;

class DeclaredClassTest extends TestCase
{
    public function testNow()
    {
        $before = DeclaredClass::now();
        require_once(__DIR__ . '/SomeClass.php');
        self::assertGreaterThan($before->count(), DeclaredClass::now()->count());
    }
}
