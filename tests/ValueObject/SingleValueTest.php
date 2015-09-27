<?php namespace BestServedCold\PhalueObjects\ValueObject;

use BestServedCold\PhalueObjects\TestCase;

class SingleValueTest extends TestCase
{
    public $singleValue;

    public function setUp()
    {
        $this->singleValue = $this->getSingleValue(1);
    }

    public function testConstructor()
    {
        $this->assertEquals(0, $this->getSingleValue(0)->getValue());
    }

    public function testGetValue()
    {
        $this->assertEquals(1, $this->singleValue->getValue());
        $this->assertNotEquals(1234, $this->singleValue->getValue());
    }

    public function testToString()
    {
        $this->assertEquals("1", "$this->singleValue");
        $this->assertNotEquals("1234", "$this->singleValue");
    }

    public function testEqual()
    {
        $this->assertTrue($this->singleValue->equals($this->getSingleValue(1)));
        $this->assertFalse($this->singleValue->equals($this->getSingleValue(123)));
    }

    private function getSingleValue($value)
    {
        return $this->getMockForAbstractClass(
            'BestServedCold\PhalueObjects\ValueObject\SingleValue',
            [$value]
        );
    }
}
