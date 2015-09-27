<?php namespace BestServedCold\PhalueObjects\Test\ExtendedArray;

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
}
