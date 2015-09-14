<?php namespace PhalueObjects\Test\DateTime\Unit;

use PhalueObjects\DateTime\Unit\Day;
use PhalueObjects\Test\TestCase;

class DayTest extends TestCase
{
    public function testNow()
    {
        $this->assertSame(date('d'), Day::now()->getValue());
    }
}
