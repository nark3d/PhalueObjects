<?php namespace BestServedCold\PhalueObjects\ValueObject;

use BestServedCold\PhalueObjects\TestCase;

class MutipleValueTest extends TestCase
{
    public $multipleValue;

    public function setUp()
    {
        $this->multipleValue = $this->getMultipleValue([1, 2, 3]);
    }

    public function testEquals()
    {
        $this->assertTrue(
            $this->multipleValue->equals(
                $this->getMultipleValue([1, 2, 3])
            )
        );

        $this->assertFalse(
            $this->multipleValue->equals(
                $this->getMultipleValue([13, 22, 35, 33])
            )
        );
    }

    public function getValues()
    {
        $this->assertSame([1, 2, 3], $this->multipleValue->getValues());
        $this->assertNotEquals([23423, 34, 5], $this->multipleValue->getValues());
    }

    private function getMultipleValue(array $array)
    {
        return $this->getMockForAbstractClass(
            'BestServedCold\PhalueObjects\ValueObject\MultipleValue',
            [[$array]]
        );
    }
}
