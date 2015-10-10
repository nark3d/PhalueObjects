<?php namespace BestServedCold\PhalueObjects;

class IdentityTest extends TestCase
{
    public function testToString()
    {
        $this->assertEquals(
            "identity",
            (string) new Identity('identity')
        );
    }
}