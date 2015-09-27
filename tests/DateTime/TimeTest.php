<?php

namespace BestServedCold\PhalueObjects\DateTime;

use BestServedCold\PhalueObjects\TestCase;

class TimeTest extends TestCase
{
    public function testGetTimestamp()
    {
        $this->assertEquals(
            (time() - strtotime('today')),
            Time::now()->getTimestamp()
        );
        $this->assertNotEquals(1, Time::now()->getTimestamp());
    }
}
