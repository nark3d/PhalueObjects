<?php

namespace BestServedCold\PhalueObjects;

/**
 * Class VOClosureTest
 *
 * @package BestServedCold\PhalueObjects
 */
class VOClosureTest extends TestCase
{
    public function testConstructor()
    {
        $closure = new VOClosure(
            function () {
                return 'bob';
            }
        );
        self::assertInstanceOf(\Closure::class, $closure->getValue());
    }
}
