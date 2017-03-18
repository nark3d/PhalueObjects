<?php

namespace BestServedCold\PhalueObjects\Internet\Html\Element;

use BestServedCold\PhalueObjects\Internet\Html\Element;
use BestServedCold\PhalueObjects\TestCase;

/**
 * Class AttributeTest
 *
 * @package BestServedCold\PhalueObjects\Internet\Html\Element
 */
class AttributeTest extends TestCase
{
    public function testConstructor()
    {
        self::assertEquals('class', Attribute::fromString('class')->getValue());
        self::setExpectedException(\InvalidArgumentException::class);
        Attribute::fromString('thisIsNotAnAttribute');
    }

    public function testIsValidForElement()
    {
        $attribute = Attribute::fromString('accept');

        self::assertTrue($attribute->validForElement(Element::fromString('input')));
        self::assertFalse($attribute->validForElement(Element::fromString('code')));
    }
}
