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
        self::assertEquals(
            'bob,  mary,  susan',
            $this->arrayToCommaString(
                ['bob', 'mary', 'susan'],
                new Integer(2)
            )
        );
        self::assertNotEquals(
            'this is not, right, susan',
            $this->arrayToCommaString(['some', 'random', 'array'], new Integer(1))
        );
    }

    public function testGetArrayUsingJsonNotation()
    {
        self::assertEquals(
            ['bob', 'susan', 'harry', 'sally'],
            $this->getArrayUsingJsonNotation('bob.susan.harry.sally')

        );
    }

    public function testGetFromArrayUsingJsonNotation()
    {
        $array = ['bob' => 'susan', 'mary' => ['susan' => 'harry']];
        self::assertEquals(
            $array,
            $this->getFromArrayUsingJsonNotation($array)
        );
        self::assertEquals(
            'harry',
            $this->getFromArrayUsingJsonNotation($array, 'mary.susan')
        );
        self::assertEquals(
            'default',
            $this->getFromArrayUsingJsonNotation($array, 'sally', 'default')
        );
        self::assertEquals(
            null,
            $this->getFromArrayUsingJsonNotation($array, 'george')
        );
        self::assertEquals(
            'susan',
            $this->getFromArrayUsingJsonNotation($array, 'bob')
        );
    }
}
