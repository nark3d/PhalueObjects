<?php

namespace BestServedCold\PhalueObjects\Mathematical\Operator;

use BestServedCold\PhalueObjects\TestCase;
use BestServedCold\PhalueObjects\Contract\ValueObject as ValueObjectInterface;

class ComparisonTraitTest extends TestCase
{
    use ComparisonTrait;

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

    public function testIsGreaterThan()
    {
        $this->value = 15;
        self::assertTrue($this->isGreaterThan($this->stub));
        $this->value = 5;
        self::assertFalse($this->isGreaterThan($this->stub));
    }

    public function testIsLessThan()
    {
        $this->value = 5;
        self::assertTrue($this->isLessThan($this->stub));
        $this->value = 15;
        self::assertFalse($this->isLessThan($this->stub));
    }

    public function testIsGreaterThanOrEqualTo()
    {
        $this->value = 15;
        self::assertTrue($this->isGreaterThanOrEqualTo($this->stub));
        $this->value = 5;
        self::assertFalse($this->isGreaterThanOrEqualTo($this->stub));
        $this->value = 10;
        self::assertTrue($this->isGreaterThanOrEqualTo($this->stub));
    }

    public function testIsLessThanOrEqualTo()
    {
        $this->value = 5;
        self::assertTrue($this->isLessThanOrEqualTo($this->stub));
        $this->value = 15;
        self::assertFalse($this->isLessThanOrEqualTo($this->stub));
        $this->value = 10;
        self::assertTrue($this->isLessThanOrEqualTo($this->stub));
    }

    public function testSpaceship()
    {
        $this->value = 10;
        self::assertEquals($this->spaceship($this->stub), 0);
        $this->value = 5;
        self::assertEquals($this->spaceship($this->stub), -1);
        $this->value = 15;
        self::assertEquals($this->spaceship($this->stub), 1);
    }

    public function getValue()
    {
        return $this->value;
    }
}
