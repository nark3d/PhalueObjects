<?php namespace PhalueObjects\Test\String;

use PhalueObjects\Test\TestCase;
use PhalueObjects\String\StringTrait;
use PhalueObjects\Mathmatic\Integer;

class StringTraitTest extends TestCase
{
    use StringTrait;

    public function testIntegerToSpace()
    {
        $this->assertEquals("    ", $this->integerToSpace(new Integer(4)));
        $this->assertNotEquals("    ", $this->integerToSpace(new Integer(0)));
    }
}