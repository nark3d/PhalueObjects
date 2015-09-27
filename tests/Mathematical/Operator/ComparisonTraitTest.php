<?php namespace BestServedCold\PhalueObjects\Mathematical\Operator;

use BestServedCold\PhalueObjects\TestCase;

class ComparisonTraitTest extends TestCase
{
    use ComparisonTrait;

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

    public function testIsGreaterThan()
    {
        $this->value = 15;
        $this->assertTrue($this->isGreaterThan($this->stub));
        $this->value = 5;
        $this->assertFalse($this->isGreaterThan($this->stub));
    }

    public function testIsLessThan()
    {
        $this->value = 5;
        $this->assertTrue($this->isLessThan($this->stub));
        $this->value = 15;
        $this->assertFalse($this->isLessThan($this->stub));
    }

    public function testIsGreaterThanOrEqualTo()
    {
        $this->value = 15;
        $this->assertTrue($this->isGreaterThanOrEqualTo($this->stub));
        $this->value = 5;
        $this->assertFalse($this->isGreaterThanOrEqualTo($this->stub));
        $this->value = 10;
        $this->assertTrue($this->isGreaterThanOrEqualTo($this->stub));
    }

    public function testIsLessThanOrEqualTo()
    {
        $this->value = 5;
        $this->assertTrue($this->isLessThanOrEqualTo($this->stub));
        $this->value = 15;
        $this->assertFalse($this->isLessThanOrEqualTo($this->stub));
        $this->value = 10;
        $this->assertTrue($this->isLessThanOrEqualTo($this->stub));
    }

    public function testSpaceship()
    {
        $this->value = 10;
        $this->assertEquals($this->spaceship($this->stub), 0);
        $this->value = 5;
        $this->assertEquals($this->spaceship($this->stub), -1);
        $this->value = 15;
        $this->assertEquals($this->spaceship($this->stub), 1);
    }

    public function getValue()
    {
        return $this->value;
    }
}
