<?php

namespace BestServedCold\PhalueObjects\Format\Float;

use BestServedCold\PhalueObjects\Format\Float\Byte\Binary;
use BestServedCold\PhalueObjects\Format\Float\Byte\Decimal;
use BestServedCold\PhalueObjects\TestCase;
use BestServedCold\PhalueObjects\VOFloat;

/**
 * Class BinaryTest
 *
 * @package BestServedCold\PhalueObjects\Format\Byte
 */
class ByteTest extends TestCase
{
    public function testFromFloat()
    {
        self::assertEquals(
            1.152921504606847e18,
            Binary::fromFloat(1.152921504606847e18)->getValue()
        );
    }

    public function testToFloat()
    {
        self::assertTrue(is_float(Binary::fromFloat(1.00)->getValue()));
    }

    public function testFromVOFloat()
    {
        self::assertTrue(is_float(Binary::fromVOFloat(new VOFloat(1.00))->getValue()));
    }

    public function testToVOFloat()
    {
        self::assertInstanceOf(VOFloat::class, Binary::fromFloat(1.00)->toVOFloat());
    }

    public function testFromString()
    {
        Binary::fromString('100 MB');

        self::assertEquals(123456, Binary::fromString('123456 Bytes')->getValue());
        self::assertEquals(155648, Binary::fromString('152 Kilobytes')->getValue());
        self::assertEquals(104857600, Binary::fromString('100 MB')->getValue());
        self::assertEquals(6442450944, Binary::fromString('6 gigabyte')->getValue());
        // Probably should get this to cause an exception if it fails.
    }

    public function testDecimalWorks()
    {
        self::assertEquals(100000000, Decimal::fromString('100 mb')->getValue());
    }

    public function testGetUnit()
    {
        self::assertEquals('Byte', Binary::fromFloat(1)->getUnit());
        self::assertEquals('Bytes', Binary::fromFloat(1 * 2)->getUnit());
        self::assertEquals('Kilobyte', Binary::fromFloat(1024)->getUnit());
        self::assertEquals('Kilobytes', Binary::fromFloat(1024 * 2)->getUnit());
        self::assertEquals('Megabyte', Binary::fromFloat(1048576)->getUnit());
        self::assertEquals('Megabytes', Binary::fromFloat(1048576 * 2)->getUnit());
        self::assertEquals('Gigabyte', Binary::fromFloat(1073741824)->getUnit());
        self::assertEquals('Gigabytes', Binary::fromFloat(1073741824 * 2)->getUnit());
        self::assertEquals('Terabyte', Binary::fromFloat(1099511627776)->getUnit());
        self::assertEquals('Terabytes', Binary::fromFloat(1099511627776 * 2)->getUnit());
        self::assertEquals('Pecabyte', Binary::fromFloat(1125899906842624)->getUnit());
        self::assertEquals('Pecabytes', Binary::fromFloat(1125899906842624 * 2)->getUnit());
        self::assertEquals('Exabyte', Binary::fromFloat(1.152921504606847e18)->getUnit());
        self::assertEquals('Exabytes', Binary::fromFloat(1.152921504606847e18 * 2)->getUnit());
        self::assertEquals('Zettabyte', Binary::fromFloat(1.180591620717411e21)->getUnit());
        self::assertEquals('Zettabytes', Binary::fromFloat(1.180591620717411e21 * 2)->getUnit());
        self::assertEquals('Yottabyte', Binary::fromFloat(1.208925819614629e24)->getUnit());
        self::assertEquals('Yottabytes', Binary::fromFloat(1.208925819614629e24 * 2)->getUnit());
    }

    public function testToString()
    {
        self::assertEquals('1 Megabyte', (string) Binary::fromFloat(1048576));
    }
}
