<?php

namespace BestServedCold\PhalueObjects\VOArray;

use BestServedCold\PhalueObjects\TestCase;
use BestServedCold\PhalueObjects\VOArray;

/**
 * Class KeyTest
 *
 * @package BestServedCold\PhalueObjects\VOArray
 */
class KeyTest extends TestCase
{

    public function testGetFirstKey()
    {
        $array = ['bob' => 'mary', 'susan' => 'barry', 'michael' => 'george'];
        self::assertEquals(
            'bob',
            (new VOArray($array))->getFirstKey()
        );
    }

    public function testGetLastKey()
    {
        $array = ['bob' => 'mary', 'susan' => 'barry', 'michael' => 'george'];
        self::assertEquals(
            'michael',
            (new VOArray($array))->getLastKey()
        );
    }
}
