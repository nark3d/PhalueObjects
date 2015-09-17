<?php namespace BestServedCold\PhalueObjects\Test\DateTime\Unit;

use BestServedCold\PhalueObjects\DateTime\Unit\Second;
use BestServedCold\PhalueObjects\TestCase;

class SecondTest extends TestCase
{
    public function testNow()
    {
        $this->assertSame((int) date('s'), Second::now()->getValue());
    }
}
