<?php

namespace BestServedCold\PhalueObjects;

class MathematicalTest extends TestCase
{
    public function testMakeNegative()
    {
        self::assertSame(-254, (new Mathematical(254))->makeNegative()->getValue());
        self::assertNotSame(
            1232,
            (new Mathematical(100))->makeNegative()->getValue()
        );
    }

    public function testMakePositive()
    {
        self::assertSame(254, (new Mathematical(-254))->makePositive()->getValue());
        self::assertNotSame(
            -1232,
            (new Mathematical(100))->makeNegative()->getValue()
        );
    }

    public function testIsNegativeTest()
    {
        self::assertTrue((new Mathematical(-1234))->isNegative());
        self::assertFalse((new Mathematical(123213))->isNegative());
    }

    public function testIsPositive()
    {
        self::assertTrue((new Mathematical(12345))->isPositive());
        self::assertFalse((new Mathematical(-123213))->isPositive());
    }

    public function testIsZeroTest()
    {
        self::assertTrue((new Mathematical(0))->isZero());
        self::assertFalse((new Mathematical(123124))->isZero());
        self::assertFalse((new Mathematical(-12356))->isZero());
    }

    public function testIsGreaterThan()
    {
        self::assertTrue(
            (new Mathematical(10))->isGreaterThan(
                new Mathematical(5)
            )
        );
        self::assertFalse(
            (new Mathematical(10))->isGreaterThan(
                new Mathematical(15)
            )
        );
    }

    public function testIsLessThan()
    {
        self::assertTrue(
            (new Mathematical(10))->isLessThan(
                new Mathematical(15)
            )
        );
        self::assertFalse(
            (new Mathematical(10))->isLessThan(
                new Mathematical(5)
            )
        );
    }

    public function testIsGreaterThanOrEqualToTest()
    {
        self::assertTrue(
            (new Mathematical(10))->isGreaterThanOrEqualTo(
                new Mathematical(10)
            )
        );
        self::assertTrue(
            (new Mathematical(10))->isGreaterThanOrEqualTo(
                new Mathematical(5)
            )
        );
        self::assertFalse(
            (new Mathematical(10))->isGreaterThanOrEqualTo(
                new Mathematical(15)
            )
        );
    }

    public function testisLessThanOrEqualTo()
    {
        self::assertTrue(
            (new Mathematical(10))->isLessThanOrEqualTo(
                new Mathematical(10)
            )
        );
        self::assertTrue(
            (new Mathematical(10))->isLessThanOrEqualTo(
                new Mathematical(15)
            )
        );
        self::assertFalse(
            (new Mathematical(10))->isLessThanOrEqualTo(
                new Mathematical(5)
            )
        );
    }

    public function testReversePolarity()
    {
        self::assertSame(
            123,
            (new Mathematical(-123))->reversePolarity()->getValue()
        );
        self::assertNotSame(
            123,
            (new Mathematical(123))->reversePolarity()->getValue()
        );
        self::assertSame(
            -123,
            (new Mathematical(123))->reversePolarity()->getValue()
        );
        self::assertNotSame(
            -123,
            (new Mathematical(-123))->reversePolarity()->getValue()
        );
    }
}
