<?php namespace BestServedCold\PhalueObjects;

/**
 * Class IdentityTest
 *
 * @package BestServedCold\PhalueObjects
 */
class IdentityTest extends TestCase
{
    public function testToString()
    {
        self::assertEquals(
            "identity",
            (string) new Identity('identity')
        );
    }
}
