<?php

namespace BestServedCold\PhalueObjects\Format\Byte;

use BestServedCold\PhalueObjects\TestCase;

class BinaryTest extends TestCase
{
    public function testGetUnit()
    {
        $this->assertEquals('Bytes', Binary::fromBytes(1)->getUnit());
        $this->assertEquals('KB', Binary::fromBytes(1024)->getUnit());
        $this->assertEquals('MB', Binary::fromBytes(1048576)->getUnit());
        $this->assertEquals('GB', Binary::fromBytes(1073741824)->getUnit());
        $this->assertEquals('TB', Binary::fromBytes(1099511627776)->getUnit());
        $this->assertEquals('PB', Binary::fromBytes(1125899906842624)->getUnit());
        $this->assertEquals('EB', Binary::fromBytes(1.152921504606847e18)->getUnit());
        $this->assertEquals('ZB', Binary::fromBytes(1.180591620717411e21)->getUnit());
        $this->assertEquals('YB', Binary::fromBytes(1.208925819614629e24)->getUnit());
    }

    public function testToString()
    {
        $this->assertEquals('1 MB', (string) Binary::fromBytes(1048576));
    }
}
