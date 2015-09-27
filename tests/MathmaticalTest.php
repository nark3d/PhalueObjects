<?php namespace BestServedCold\PhalueObjects;

class MathmaticalTest extends TestCase
{
    public function testMakeNegative()
    {
        $this->assertSame(-254, (new Mathematical(254))->makeNegative()->getValue());
        $this->assertNotSame(
            1232,
            (new Mathematical(100))->makeNegative()->getValue()
        );
    }

    public function testMakePositive()
    {
        $this->assertSame(254, (new Mathematical(-254))->makePositive()->getValue());
        $this->assertNotSame(
            -1232,
            (new Mathematical(100))->makeNegative()->getValue()
        );
    }

    public function testIsNegativeTest()
    {
        $this->assertTrue((new Mathematical(-1234))->isNegative());
        $this->assertFalse((new Mathematical(123213))->isNegative());
    }

    public function testIsPositive()
    {
        $this->assertTrue((new Mathematical(12345))->isPositive());
        $this->assertFalse((new Mathematical(-123213))->isPositive());
    }

    public function testIsZeroTest()
    {
        $this->assertTrue((new Mathematical(0))->isZero());
        $this->assertFalse((new Mathematical(123124))->isZero());
        $this->assertFalse((new Mathematical(-12356))->isZero());
    }

    public function testIsGreaterThan()
    {
        $this->assertTrue(
            (new Mathematical(10))->isGreaterThan(
                new Mathematical(5)
            )
        );
        $this->assertFalse(
            (new Mathematical(10))->isGreaterThan(
                new Mathematical(15)
            )
        );
    }

    public function testIsLessThan()
    {
        $this->assertTrue(
            (new Mathematical(10))->isLessThan(
                new Mathematical(15)
            )
        );
        $this->assertFalse(
            (new Mathematical(10))->isLessThan(
                new Mathematical(5)
            )
        );
    }

    public function testIsGreaterThanOrEqualToTest()
    {
        $this->assertTrue(
            (new Mathematical(10))->isGreaterThanOrEqualTo(
                new Mathematical(10)
            )
        );
        $this->assertTrue(
            (new Mathematical(10))->isGreaterThanOrEqualTo(
                new Mathematical(5)
            )
        );
        $this->assertFalse(
            (new Mathematical(10))->isGreaterThanOrEqualTo(
                new Mathematical(15)
            )
        );
    }

    public function testisLessThanOrEqualTo()
    {
        $this->assertTrue(
            (new Mathematical(10))->isLessThanOrEqualTo(
                new Mathematical(10)
            )
        );
        $this->assertTrue(
            (new Mathematical(10))->isLessThanOrEqualTo(
                new Mathematical(15)
            )
        );
        $this->assertFalse(
            (new Mathematical(10))->isLessThanOrEqualTo(
                new Mathematical(5)
            )
        );
    }

    public function testReversePolarity()
    {
        $this->assertSame(
            123,
            (new Mathematical(-123))->reversePolarity()->getValue()
        );
        $this->assertNotSame(
            123,
            (new Mathematical(123))->reversePolarity()->getValue()
        );
        $this->assertSame(
            -123,
            (new Mathematical(123))->reversePolarity()->getValue()
        );
        $this->assertNotSame(
            -123,
            (new Mathematical(-123))->reversePolarity()->getValue()
        );
    }
}
