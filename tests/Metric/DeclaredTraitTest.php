<?php

namespace BestServedCold\PhalueObjects\Metric;

use BestServedCold\PhalueObjects\TestCase;

class DeclaredTraitTest extends TestCase
{
    public function testNow()
    {
        $before = DeclaredTrait::now();
        require_once(__DIR__ . '/SomeTrait.php');
        self::assertGreaterThan($before->count(), DeclaredTrait::now()->count());
    }
}
