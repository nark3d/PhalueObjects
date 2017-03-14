<?php

namespace BestServedCold\PhalueObjects\Mathematical\Operator;

use BestServedCold\PhalueObjects\TestCase;

class TypeTraitTest extends TestCase
{
    use TypeTrait;

    protected $value;

    public function testIsPositive()
    {
        $this->value = 23;
        self::assertTrue($this->isPositive());
        $this->value = -23;
        self::assertFalse($this->isPositive());
    }

    public function testIsNegative()
    {
        $this->value = -23;
        self::assertTrue($this->isNegative());
        $this->value = 23;
        self::assertFalse($this->isNegative());
    }

    public function testIsZero()
    {
        $this->value = 0;
        self::assertTrue($this->isZero());
        $this->value = 1234;
        self::assertFalse($this->isZero());
    }

    public function testIsNegativeOrZero()
    {
        $this->value = 0;
        self::assertTrue($this->isNegativeOrZero());
        $this->value = -342345234;
        self::assertTrue($this->isNegativeOrZero());
        $this->value = 234234;
        self::assertFalse($this->isNegativeOrZero());
    }

    public function testIsPositiveOrZero()
    {
        $this->value = 0;
        self::assertTrue($this->isPositiveOrZero());
        $this->value = 324234;
        self::assertTrue($this->isPositiveOrZero());
        $this->value = -2344;
        self::assertFalse($this->isPositiveOrZero());
    }

    public function getValue()
    {
        return $this->value;
    }
}
