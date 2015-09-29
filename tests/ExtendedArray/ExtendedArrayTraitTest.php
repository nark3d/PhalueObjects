<?php

namespace BestServedCold\PhalueObjects\Test\ExtendedArray;

use BestServedCold\PhalueObjects\TestCase;
use BestServedCold\PhalueObjects\Mathematical\Integer;
use BestServedCold\PhalueObjects\ExtendedArray\ExtendedArrayTrait;

class ExtendedArrayTraitTest extends TestCase
{
    use ExtendedArrayTrait;

    public function testArrayToCommaString()
    {
        $this->assertEquals(
            'bob,  mary,  susan',
            $this->arrayToCommaString(
                ['bob', 'mary', 'susan'],
                new Integer(2)
            )
        );
        $this->assertNotEquals(
            'this is not, right, susan',
            $this->arrayToCommaString(['some', 'random', 'array'], new Integer(1))
        );
    }

    public function testGetArrayUsingJsonNotation()
    {
        $this->assertEquals(
            ['bob', 'susan', 'harry', 'sally'],
            $this->getArrayUsingJsonNotation('bob.susan.harry.sally')

        );
    }

    public function testGetFromArrayUsingJsonNotation()
    {
        $array = ['bob' => 'susan', 'mary' => ['susan' => 'harry']];
        $this->assertEquals(
            $array,
            $this->getFromArrayUsingJsonNotation($array)
        );
        $this->assertEquals(
            'harry',
            $this->getFromArrayUsingJsonNotation($array, 'mary.susan')
        );
        $this->assertEquals(
            'default',
            $this->getFromArrayUsingJsonNotation($array, 'sally', 'default')
        );
        $this->assertEquals(
            null,
            $this->getFromArrayUsingJsonNotation($array, 'george')
        );
    }
}
