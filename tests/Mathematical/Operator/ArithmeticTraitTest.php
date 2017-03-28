<?php

namespace BestServedCold\PhalueObjects\Mathematical\Operator;

use BestServedCold\PhalueObjects\Contract\ValueObject as ValueObjectInterface;
use BestServedCold\PhalueObjects\TestCase;

class ArithmeticTraitTest extends TestCase
{
    use TypeTrait;
    use ArithmeticTrait;

    protected $value;
    protected $stub;

    public function setUp()
    {
        $this->stub = $this->getMock(
            ValueObjectInterface::class,
            ['getValue', '__toString', '__set', 'equals', 'getType', 'hash', '__destruct']
        );

        $this->stub->expects($this->any())
            ->method('getValue')
            ->will($this->returnValue(10));
    }

    public function __construct($value = null)
    {
        $this->value = $value;
    }

    public function testAbsolute()
    {
        $this->value = -123450;
        self::assertEquals(123450, $this->absolute()->getValue());
        self::assertNotEquals($this->value, $this->absolute()->getValue());
        $this->value = round(-123.25679, 5);
        self::assertEquals(round(123.25679, 5), $this->absolute()->getValue());
        self::assertNotEquals($this->value, $this->absolute()->getValue());
    }

    public function testMakeNegative()
    {
        $this->value = 99;
        self::assertEquals(-99, $this->makeNegative()->getValue());
        self::assertNotEquals($this->value, $this->makeNegative()->getValue());
        $this->value = 99.123214001;
        self::assertEquals(-99.123214001, $this->makeNegative()->getValue());
        self::assertNotEquals($this->value, $this->makeNegative()->getValue());
    }

    public function testMakePositive()
    {
        $this->value = -99;
        self::assertEquals(99, $this->makePositive()->getValue());
        self::assertNotEquals($this->value, $this->makePositive()->getValue());
        $this->value = -99.123214001;
        self::assertEquals(99.123214001, $this->makePositive()->getValue());
        self::assertNotEquals($this->value, $this->makePositive()->getValue());
    }

    public function testReversePolarity()
    {
        $this->value = 35;
        self::assertEquals(-35, $this->reversePolarity()->getValue());
        self::assertNotEquals($this->value, $this->reversePolarity()->getValue());
        $this->value = -35;
        self::assertEquals(35, $this->reversePolarity()->getValue());
        self::assertNotEquals($this->value, $this->reversePolarity()->getValue());
    }

    public function testAdd()
    {
        $this->value = 1;
        self::assertEquals(11, $this->add($this->stub)->getValue());
        self::assertNotEquals(2, $this->add($this->stub)->getValue());
        $this->value = 10.30303;
        self::assertEquals(20.30303, $this->add($this->stub)->getValue());
        self::assertNotEquals(5, $this->add($this->stub)->getValue());
    }

    public function testSubtract()
    {
        $this->value = 20;
        self::assertEquals(10, $this->subtract($this->stub)->getValue());
        self::assertNotEquals(2, $this->subtract($this->stub)->getValue());
        $this->value = 10.30303;
        self::assertEquals(0.30303, $this->subtract($this->stub)->getValue());
        self::assertNotEquals(5, $this->subtract($this->stub)->getValue());
    }

    public function testMultiply()
    {
        $this->value = 5;
        self::assertEquals(50, $this->multiply($this->stub)->getValue());
        self::assertNotEquals(40, $this->multiply($this->stub)->getValue());
    }

    public function testDivide()
    {
        $this->value = 200;
        self::assertEquals(20, $this->divide($this->stub)->getValue());
        self::assertNotEquals(55, $this->divide($this->stub)->getValue());
    }

    public function testModulus()
    {
        $this->value = -92;
        self::assertEquals(-2, $this->modulus($this->stub)->getValue());
        self::assertNotEquals(-3, $this->modulus($this->stub)->getValue());
        $this->value = -5;
        self::assertEquals(-5, $this->modulus($this->stub)->getValue());
        self::assertNotEquals(-6, $this->modulus($this->stub)->getValue());
    }

    public function testExponentiation()
    {
        $this->value = 5;
        self::assertEquals(9765625, $this->exponentiation($this->stub)->getValue());
        self::assertNotEquals(
            9765624,
            $this->exponentiation($this->stub)->getValue()
        );
    }

    public function getValue()
    {
        return $this->value;
    }
}
