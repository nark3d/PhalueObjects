<?php namespace BestServedCold\PhalueObjects\Test\DateTime\Unit;

use BestServedCold\PhalueObjects\DateTime\Unit\Minute;
use BestServedCold\PhalueObjects\TestCase;

class MinuteTest extends TestCase
{
    public function testNow()
    {
        $this->assertSame(date('i'), Minute::now()->getValue());
    }
}
