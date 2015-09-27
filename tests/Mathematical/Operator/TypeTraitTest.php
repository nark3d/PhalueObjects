<?php namespace BestServedCold\PhalueObjects\Mathematical\Operator;

use BestServedCold\PhalueObjects\TestCase;

class TypeTraitTest extends TestCase
{
    use TypeTrait;

    protected $value;

    public function testIsPositive()
    {
        $this->value = 23;
        $this->assertTrue($this->isPositive());
        $this->value = -23;
        $this->assertFalse($this->isPositive());
    }

    public function testIsNegative()
    {
        $this->value = -23;
        $this->assertTrue($this->isNegative());
        $this->value = 23;
        $this->assertFalse($this->isNegative());
    }

    public function testIsZero()
    {
        $this->value = 0;
        $this->assertTrue($this->isZero());
        $this->value = 1234;
        $this->assertFalse($this->isZero());
    }

    public function testIsNegativeOrZero()
    {
        $this->value = 0;
        $this->assertTrue($this->isNegativeOrZero());
        $this->value = -342345234;
        $this->assertTrue($this->isNegativeOrZero());
        $this->value = 234234;
        $this->assertFalse($this->isNegativeOrZero());
    }

    public function testIsPositiveOrZero()
    {
        $this->value = 0;
        $this->assertTrue($this->isPositiveOrZero());
        $this->value = 324234;
        $this->assertTrue($this->isPositiveOrZero());
        $this->value = -2344;
        $this->assertFalse($this->isPositiveOrZero());
    }

    public function getValue()
    {
        return $this->value;
    }
}