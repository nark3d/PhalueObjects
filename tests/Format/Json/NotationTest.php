<?php

namespace BestServedCold\PhalueObjects\Format\Json;

use BestServedCold\PhalueObjects\VOArray;
use BestServedCold\PhalueObjects\TestCase;

/**
 * Class NotationTest
 * @package BestServedCold\PhalueObjects\Format\Json
 */
class NotationTest extends TestCase
{
    public function testToVOArray()
    {
        self::assertInstanceOf(
            VOArray::class,
            Notation::fromString('bob.mary.string')->toVOArray()
        );
    }
}
