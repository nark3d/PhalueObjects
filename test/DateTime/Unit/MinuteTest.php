<?php namespace PhalueObjects\Test\DateTime\Unit;

use PhalueObjects\DateTime\Unit\Minute;
use PhalueObjects\Test\TestCase;

class MinuteTest extends TestCase
{
    public function testNow()
    {
        $this->assertSame(date('i'), Minute::now()->getValue());
    }
}
