<?php namespace BestServedCold\PhalueObjects\Mathematical\Operator;

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
            'BestServedCold\PhalueObjects\ValueObjectInterface',
            ['getValue', '__toString', '__set']
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
        $this->assertEquals(123450, $this->absolute()->getValue());
        $this->assertNotEquals($this->value, $this->absolute()->getValue());
        $this->value = round(-123.25679, 5);
        $this->assertEquals(round(123.25679, 5), $this->absolute()->getValue());
        $this->assertNotEquals($this->value, $this->absolute()->getValue());
    }

    public function testMakeNegative()
    {
        $this->value = 99;
        $this->assertEquals(-99, $this->makeNegative()->getValue());
        $this->assertNotEquals($this->value, $this->makeNegative()->getValue());
        $this->value = 99.123214001;
        $this->assertEquals(-99.123214001, $this->makeNegative()->getValue());
        $this->assertNotEquals($this->value, $this->makeNegative()->getValue());
    }

    public function testMakePositive()
    {
        $this->value = -99;
        $this->assertEquals(99, $this->makePositive()->getValue());
        $this->assertNotEquals($this->value, $this->makePositive()->getValue());
        $this->value = -99.123214001;
        $this->assertEquals(99.123214001, $this->makePositive()->getValue());
        $this->assertNotEquals($this->value, $this->makePositive()->getValue());
    }

    public function testReversePolarity()
    {
        $this->value = 35;
        $this->assertEquals(-35, $this->reversePolarity()->getValue());
        $this->assertNotEquals($this->value, $this->reversePolarity()->getValue());
        $this->value = -35;
        $this->assertEquals(35, $this->reversePolarity()->getValue());
        $this->assertNotEquals($this->value, $this->reversePolarity()->getValue());
    }

    public function testAdd()
    {
        $this->value = 1;
        $this->assertEquals(11, $this->add($this->stub)->getValue());
        $this->assertNotEquals(2, $this->add($this->stub)->getValue());
        $this->value = 10.30303;
        $this->assertEquals(20.30303, $this->add($this->stub)->getValue());
        $this->assertNotEquals(5, $this->add($this->stub)->getValue());
    }

    public function testSubtract()
    {
        $this->value = 20;
        $this->assertEquals(10, $this->subtract($this->stub)->getValue());
        $this->assertNotEquals(2, $this->subtract($this->stub)->getValue());
        $this->value = 10.30303;
        $this->assertEquals(0.30303, $this->subtract($this->stub)->getValue());
        $this->assertNotEquals(5, $this->subtract($this->stub)->getValue());
    }

    public function testMultiply()
    {
        $this->value = 5;
        $this->assertEquals(50, $this->multiply($this->stub)->getValue());
        $this->assertNotEquals(40, $this->multiply($this->stub)->getValue());
    }

    public function testDivide()
    {
        $this->value = 200;
        $this->assertEquals(20, $this->divide($this->stub)->getValue());
        $this->assertNotEquals(55, $this->divide($this->stub)->getValue());
    }

    public function testModulus()
    {
        $this->value = -92;
        $this->assertEquals(-2, $this->modulus($this->stub)->getValue());
        $this->assertNotEquals(-3, $this->modulus($this->stub)->getValue());
        $this->value = -5;
        $this->assertEquals(-5, $this->modulus($this->stub)->getValue());
        $this->assertNotEquals(-6, $this->modulus($this->stub)->getValue());
    }

    public function testExponentiation()
    {
        $this->value = 5;
        $this->assertEquals(9765625, $this->exponentiation($this->stub)->getValue());
        $this->assertNotEquals(
            9765624,
            $this->exponentiation($this->stub)->getValue()
        );
    }

    public function getValue()
    {
        return $this->value;
    }
}
