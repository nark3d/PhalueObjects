<?php

namespace BestServedCold\PhalueObjects;

use InvalidArgumentException;
use RuntimeException;

class MockValueObject extends ValueObject
{
    protected $bob;
    protected $value = 'hello';

    /**
     * @return string
     */
    public function __toString()
    {
        parent::__toString();
    }
}

class AbstractObjectTest extends TestCase
{
    public $abstractObject;

    public function setUp()
    {
        $this->abstractObject = new MockValueObject('hello');
    }

    public function testHash()
    {
        self::assertNotEquals(
            $this->abstractObject->hash(),
            (new MockValueObject('hello'))->hash()
        );
    }

    public function testSet()
    {
        $this->setExpectedException(
            RuntimeException::class,
            "You cannot set a value of a Value Object, that's the whole point!"
        );

        $this->abstractObject->bob = 'testValue';
    }

    public function testCloneObject()
    {
        self::assertEquals(
            $this->abstractObject,
            $this->abstractObject->cloneObject($this->abstractObject)
        );
    }

    public function testGetValue()
    {
        self::assertEquals(
            'hello',
            $this->abstractObject->getValue()
        );
    }

    public function testEquals()
    {
        self::assertTrue(
            $this->abstractObject->equals($this->abstractObject)
        );
    }

    public function testDiff()
    {
        $integer = new ValueObject(2);
        self::assertEquals(1, $integer->diff(new ValueObject(1))->getValue());

        $array = new ValueObject(['test', 'array', 'bob']);
        self::assertEquals([2 => 'bob'], $array->diff(new ValueObject(['test', 'array']))->getValue());

        $null = new ValueObject(null);
        self::assertEquals(2, $null->diff(new ValueObject(2))->getValue());

        $string = new ValueObject('originalStringDiffString');
        self::assertEquals('originalString', $string->diff(new ValueObject('DiffString'))->getValue());

        $resourceType = $this->reflect(new ValueObject('reflect'));
        $resourceType->type = 'resource';

        self::assertNull($resourceType->diff(new ValueObject('string')));

        $notAType = $this->reflect(new ValueObject('string'));
        $notAType->type = 'This is definitely not a type';

        $this->setExpectedException(
            InvalidArgumentException::class,
            "Cannot diff type [This is definitely not a type]."
        );

        $notAType->diff(new ValueObject('string'));
    }

    public function testCount()
    {
        $integer = new ValueObject(21);
        self::assertEquals(21, $integer->count());

        $array = new ValueObject([1, 2, 3, 4, 5]);
        self::assertEquals(5, $array->count());

        $string = new ValueObject('thisIsAString!');
        self::assertEquals(14, $string->count());

        $resourceType = $this->reflect(new ValueObject('resource'));
        $resourceType->type = 'resource';
        self::assertNull($resourceType->count());

        $notAType = $this->reflect(new ValueObject('string'));
        $notAType->type = 'This is definitely not a type';

        $this->setExpectedException(
            InvalidArgumentException::class,
            'Cannot count type [This is definitely not a type].'
        );
        $notAType->count();

    }
}
