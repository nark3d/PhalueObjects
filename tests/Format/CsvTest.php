<?php

namespace BestServedCold\PhalueObjects\Format;

use BestServedCold\PhalueObjects\TestCase;
use BestServedCold\PhalueObjects\VOArray;
use BestServedCold\PhalueObjects\VOString;

/**
 * Class CsvTest
 *
 * @package BestServedCold\PhalueObjects\Format
 */
class CsvTest extends TestCase
{
    public function testFromArray()
    {
        self::assertSame(
            'bob,mary,susan' . PHP_EOL,
            Csv::fromArray(['bob', 'mary', 'susan'])->toString()
        );

        self::assertSame(
            'bob,mary,susan' . PHP_EOL . 'harry,sally,mike' . PHP_EOL,
            Csv::fromArray([['bob', 'mary', 'susan'], ['harry', 'sally', 'mike']])->toString()
        );
    }

    public function testToArray()
    {
        self::assertEquals(
            ['bob', 'mary', 'susan'],
            (new Csv('bob,mary,susan'))->toArray()
        );
    }

    public function testFromVOArray()
    {
        self::assertEquals(
            'bob,mary,susan' . PHP_EOL,
            (string) Csv::fromVOArray(VOArray::fromArray(['bob', 'mary', 'susan']))
        );
    }

    public function testToVOArray()
    {
        self::assertInstanceOf(
            VOArray::class,
            (new Csv('bob,mary,susan'))->toVOArray()
        );
    }

    public function testFromString()
    {
        self::assertEquals(
            'bob,mary,susan',
            Csv::fromString('bob,mary,susan')->getValue()
        );
    }

    public function testToString()
    {
         self::assertEquals(
             'bob,mary,susan' . PHP_EOL,
             Csv::fromArray(['bob', 'mary', 'susan'])->toString()
         );
    }

    public function testFromVOString()
    {
        self::assertEquals(
            'bob,mary,susan',
            Csv::fromVOString(VOString::fromString('bob,mary,susan'))->getValue()
        );
    }

    public function testToVOString()
    {
        self::assertInstanceOf(
            VOString::class,
            Csv::fromString('bob,mary,susan')->toVOString()
        );
    }
}
