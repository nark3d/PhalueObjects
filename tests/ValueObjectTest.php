<?php

namespace BestServedCold\PhalueObjects;

class MockValueObject extends ValueObject
{
    protected $bob;

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
        $this->abstractObject = new MockValueObject();
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
            (new MockValueObject())->hash()
        );
    }

    public function testSet()
    {
        $this->setExpectedException('\RuntimeException');
        $this->abstractObject->bob = 'testValue';
    }
}
