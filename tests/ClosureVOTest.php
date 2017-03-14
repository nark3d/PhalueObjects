<?php

namespace BestServedCold\PhalueObjects;

/**
 * Class ClosureVOTest
 *
 * @package BestServedCold\PhalueObjects
 */
class ClosureVOTest extends TestCase
{
    public function testConstructor()
    {
        $closure = new ClosureVO(
            function () {
                return 'bob';
            }
        );
        self::assertInstanceOf(\Closure::class, $closure->getValue());
    }
}
