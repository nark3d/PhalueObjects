<?php

namespace BestServedCold\PhalueObjects\VOArray;

use BestServedCold\PhalueObjects\TestCase;

/**
 * Class MapTest
 *
 * @package BestServedCold\PhalueObjects\VOArray
 */
class MapTest extends TestCase
{
    public function testConstructor()
    {
        $array = ['some' => 'data', 'to' => 'test'];
        self::assertEquals(
            ['some:data', 'to:test'],
            (
                new Map(
                    function ($key, $value) {
                        return $key . ':' . $value;
                    },
                    array_keys($array),
                    $array
                )
            )->getValue()
        );
    }


}
