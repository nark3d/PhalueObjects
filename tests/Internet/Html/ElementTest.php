<?php

namespace BestServedCold\PhalueObjects\Internet\Html;

use BestServedCold\PhalueObjects\TestCase;

/**
 * Class ElementTest
 *
 * @package BestServedCold\PhalueObjects\Internet\Html
 */
class ElementTest extends TestCase
{
    public function testConstructor()
    {
        self::assertEquals('div', (new Element('div'))->getValue());
        self::setExpectedException(\InvalidArgumentException::class);
        Element::fromString('thisIsNotAnElement');
    }

    public function testIsVoid()
    {
        self::assertTrue(Element::fromString('input')->isVoid());
        self::assertFalse(Element::fromString('div')->isVoid());
    }
}
