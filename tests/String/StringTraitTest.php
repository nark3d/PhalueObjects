<?php namespace BestServedCold\PhalueObjects\String;

use BestServedCold\PhalueObjects\TestCase;
use BestServedCold\PhalueObjects\Mathematical\Integer;

class StringTraitTest extends TestCase
{
    use StringTrait;

    public function testIntegerToSpace()
    {
        $this->assertEquals("    ", $this->integerToSpace(new Integer(4)));
        $this->assertNotEquals("    ", $this->integerToSpace(new Integer(0)));
    }
}
