<?php

namespace BestServedCold\PhalueObjects\Metric;

use BestServedCold\PhalueObjects\TestCase;

class IncludedFileTest extends TestCase
{
    public function testNow()
    {
        $before = IncludedFile::now();
        require_once(__DIR__ . '/SomeFile.php');
        self::assertGreaterThan($before->count(), IncludedFile::now()->count());
    }
}
