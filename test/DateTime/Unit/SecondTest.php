<?php namespace PhalueObjects\Test\DateTime\Unit;

use PhalueObjects\DateTime\Unit\Second;
use PhalueObjects\Test\TestCase;

class SecondTest extends TestCase
{
    public function testNow()
    {
        $this->assertSame(date('s'), Second::now()->getValue());
    }
}
