<?php

namespace BestServedCold\PhalueObjects\Format\Json;

use BestServedCold\PhalueObjects\ArrayVO;
use BestServedCold\PhalueObjects\TestCase;

/**
 * Class NotationTest
 * @package BestServedCold\PhalueObjects\Format\Json
 */
class NotationTest extends TestCase
{
    public function testToArrayVO()
    {
        self::assertInstanceOf(
            ArrayVO::class,
            Notation::fromString('bob.mary.string')->toArrayVO()
        );
    }
}
