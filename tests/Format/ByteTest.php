<?php

namespace BestServedCold\PhalueObjects\Format;

use BestServedCold\PhalueObjects\TestCase;

class ByteTest extends TestCase
{
    public function testGetUnit()
    {
        $this->assertEquals('Bytes', Byte::fromBytes(1)->getUnit());
        $this->assertEquals('KB', Byte::fromBytes(1024)->getUnit());
        $this->assertEquals('MB', Byte::fromBytes(1048576)->getUnit());
        $this->assertEquals('GB', Byte::fromBytes(1073741824)->getUnit());
        $this->assertEquals('TB', Byte::fromBytes(1099511627776)->getUnit());
        $this->assertEquals('PB', Byte::fromBytes(1125899906842624)->getUnit());
        $this->assertEquals('EB', Byte::fromBytes(1.152921504606847e18)->getUnit());
        $this->assertEquals('ZB', Byte::fromBytes(1.180591620717411e21)->getUnit());
        $this->assertEquals('YB', Byte::fromBytes(1.208925819614629e24)->getUnit());
    }

    public function testToString()
    {
        $this->assertEquals('1 MB', Byte::fromBytes(1048576));
    }

    public function testRoundDown()
    {
        $this->assertEquals(1024, Byte::fromBytes(1073741824)->roundDown());
    }
}
