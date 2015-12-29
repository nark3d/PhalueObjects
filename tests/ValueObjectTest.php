<?php

namespace BestServedCold\PhalueObjects;

use JMS\Serializer\Exception\RuntimeException;

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

    public function testGetShortName()
    {
        $this->assertSame(
            'MockValueObject',
            $this->abstractObject->getShortName()
        );
        $this->assertNotSame(
            'AbstractObject',
            $this->abstractObject->getShortName()
        );
    }

    public function testHash()
    {
        $this->assertNotSame(
            $this->abstractObject->hash(),
            (new MockValueObject('hello'))->hash()
        );
    }

    public function testSet()
    {
        $this->setExpectedException('\RuntimeException');
        try {
            $this->abstractObject->bob = 'testValue';
        } catch (RuntimeException $e) {
            $this->assertEquals(
                "You cannot set a value of a Value Object, that's the whole point!",
                $e->getMessage()
            );
        }
    }

    public function testCloneObject()
    {
        $this->assertEquals(
            $this->abstractObject,
            $this->abstractObject->cloneObject($this->abstractObject)
        );
    }

    public function testGetValue()
    {
        $this->assertEquals(
            'hello',
            $this->abstractObject->getValue()
        );
    }
}
