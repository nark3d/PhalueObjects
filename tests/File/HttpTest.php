<?php namespace BestServedCold\PhalueObjects\File;

use BestServedCold\PhalueObjects\TestCase;

class HttpTest extends TestCase
{
    public function testValid()
    {
        $http = new Http('http://example.com');
        $this->assertTrue($http->valid());

        $brokenHttp = new Http('This is not a URL');
        $this->assertFalse($brokenHttp->valid());
    }
}
