<?php

namespace BestServedCold\PhalueObjects\Format\Json;

use BestServedCold\PhalueObjects\VOArray;
use BestServedCold\PhalueObjects\TestCase;
use BestServedCold\PhalueObjects\VOString;

/**
 * Class NotationTest
 * @package BestServedCold\PhalueObjects\Format\Json
 */
class NotationTest extends TestCase
{
    public function testToVOArray()
    {
        self::assertInstanceOf(
            VOArray::class,
            Notation::fromString('bob.mary.string')->toVOArray()
        );
    }

    public function testFromVOArray()
    {
        self::assertEquals(
            'bob.mary.string',
            Notation::fromVOArray(new VOArray(['bob', 'mary', 'string']))->getValue()
        );
    }

    public function testToArray()
    {
        self::assertEquals(
            ['bob', 'mary', 'string'],
            Notation::fromString('bob.mary.string')->toArray()
        );
    }

    public function testFromArray()
    {
        self::assertEquals(
            'bob.mary.string',
            Notation::fromArray([ 'bob', 'mary', 'string' ])->getValue()
        );
    }

    public function testToString()
    {
        self::assertEquals(
            'bob.mary.string',
            Notation::fromArray([ 'bob', 'mary', 'string' ])->toString()
        );
    }

    public function testFromString()
    {
        self::assertEquals(
            'bob.mary.string',
            Notation::fromString('bob.mary.string')->getValue()
        );
    }

    public function testToVOString()
    {
        self::assertInstanceOf(
            VOString::class,
            Notation::fromString('bob.mary.string')->toVOString()
        );
    }

    public function testFromVOString()
    {

    }
}
