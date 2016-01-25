<?php namespace BestServedCold\PhalueObjects\Access;

use BestServedCold\PhalueObjects\TestCase;

class CurlTest extends TestCase
{
    public function testConstructor()
    {
        $curl = Curl::fromString('http://bestservedcold.com');

        $this->assertEquals('curl', get_resource_type($curl->getValue()));
        $this->assertEquals(
            [
                'CURLOPT_HEADER' => true,
                'CURLOPT_TIMEOUT' => true,
                'CURLOPT_CONNECTTIMEOUT' => true
            ],
            $curl->getOptions()
        );
    }
}
