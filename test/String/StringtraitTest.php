<?php namespace PhalueObjects\Test\String;

use PhalueObjects\Test\TestCase;
use PhalueObjects\String\StringTrait;
use PhalueObjects\Number\Integer;

class StringTraitTest extends TestCase
{
    use StringTrait;

    public function testIntegerToSpace()
    {
        $integer = new Integer(8);
        $this->assertTrue($integer->getValue() === $integer->getValue());
//        $this->integerToSpace(
//            $this->integerToSpace(
//                new Integer(8)),
//                $integer->getValue()
//        );
    }
}