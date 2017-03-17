<?php

namespace BestServedCold\PhalueObjects\VOArray;

use BestServedCold\PhalueObjects\Format\Json\Notation;
use BestServedCold\PhalueObjects\TestCase;
use BestServedCold\PhalueObjects\VOArray;

/**
 * Class FindTest
 *
 * @package BestServedCold\PhalueObjects\VOArray
 */
class FindTest extends TestCase
{
    public function testJsonNotation()
    {
        $array = ['bob' => ['susan' => ['mary' => 'findMe']]];
        self::assertEquals(
            'findMe',
            (new VOArray($array))
                ->jsonNotation(Notation::fromString('bob.susan.mary'))
        );

        self::assertFalse(
            (new VOArray($array))
                ->jsonNotation(Notation::fromString('bob.susan.barry'))
        );
    }

    public function testNativeArray()
    {
        $array = ['bob' => ['susan' => ['mary' => 'findMe']]];
        self::assertEquals(
            'findMe',
            (new VOArray($array))
                ->nativeArray(['bob', 'susan', 'mary'])
        );

        self::assertFalse(
            (new VOArray($array))
                ->nativeArray(['bob', 'no', 'way', 'hosai'])
        );
    }
}
