<?php

namespace BestServedCold\PhalueObjects\Format\Byte;

use BestServedCold\PhalueObjects\TestCase;

/**
 * Class BinaryTest
 *
 * @package BestServedCold\PhalueObjects\Format\Byte
 */
class BinaryTest extends TestCase
{
    public function testGetUnit()
    {
        self::assertEquals('Bytes', Binary::fromBytes(1)->getUnit());
        self::assertEquals('KB', Binary::fromBytes(1024)->getUnit());
        self::assertEquals('MB', Binary::fromBytes(1048576)->getUnit());
        self::assertEquals('GB', Binary::fromBytes(1073741824)->getUnit());
        self::assertEquals('TB', Binary::fromBytes(1099511627776)->getUnit());
        self::assertEquals('PB', Binary::fromBytes(1125899906842624)->getUnit());
        self::assertEquals('EB', Binary::fromBytes(1.152921504606847e18)->getUnit());
        self::assertEquals('ZB', Binary::fromBytes(1.180591620717411e21)->getUnit());
        self::assertEquals('YB', Binary::fromBytes(1.208925819614629e24)->getUnit());
    }

    public function testToString()
    {
        self::assertEquals('1 MB', (string) Binary::fromBytes(1048576));
    }
}
