<?php

namespace BestServedCold\PhalueObjects;

use BestServedCold\PhalueObjects\VOClosure\Value;
use RuntimeException;

class AbstractObjectTest extends TestCase
{
    public $valueObject;

    public function setUp()
    {
        $this->valueObject  = $this->getMockBuilder(ValueObject::class)
            ->setConstructorArgs(['hello'])
            ->getMockForAbstractClass();
    }

    public function testHash()
    {
        self::assertNotEquals(
            $this->valueObject->hash(),
            (new VOString('hello'))->hash()
        );
    }

    public function testSet()
    {
        $this->setExpectedException(
            RuntimeException::class,
            "You cannot set a value of a Value Object, that's the whole point!"
        );

        $this->valueObject->bob = 'testValue';
    }

    public function testGetValue()
    {
        self::assertEquals(
            'hello',
            $this->valueObject->getValue()
        );
    }

    public function testEquals()
    {
        self::assertTrue(
            $this->valueObject->equals($this->valueObject)
        );
    }
}
