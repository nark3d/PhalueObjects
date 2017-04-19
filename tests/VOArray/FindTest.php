<?php

namespace BestServedCold\PhalueObjects\VOArray;

use BestServedCold\PhalueObjects\Format\String\Json\Notation;
use BestServedCold\PhalueObjects\TestCase;

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
            (new Find($array))
                ->jsonNotation(Notation::fromString('bob.susan.mary'))
        );

        self::assertFalse(
            (new Find($array))
                ->jsonNotation(Notation::fromString('bob.susan.barry'))
        );
    }

    public function testNativeArray()
    {
        $array = ['bob' => ['susan' => ['mary' => 'findMe']]];
        self::assertEquals(
            'findMe',
            (new Find($array))
                ->nativeArray(['bob', 'susan', 'mary'])
        );

        self::assertFalse(
            (new Find($array))
                ->nativeArray(['bob', 'no', 'way', 'hosai'])
        );
    }
}
