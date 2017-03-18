<?php

namespace BestServedCold\PhalueObjects\Format;

use BestServedCold\PhalueObjects\TestCase;
use BestServedCold\PhalueObjects\VOArray;

/**
 * Class CsvTest
 *
 * @package BestServedCold\PhalueObjects\Format
 */
class CsvTest extends TestCase
{
    public function testFromArray()
    {
        self::assertEquals(
            'bob,mary,susan',
            Csv::fromArray(['bob', 'mary', 'susan'])
        );
    }

    public function testFromVOArray()
    {
        self::assertEquals(
            'bob,mary,susan',
            Csv::fromVOArray(VOArray::fromArray(['bob', 'mary', 'susan']))
        );
    }

    public function testToArray()
    {
        self::assertEquals(
            ['bob', 'mary', 'susan'],
            (new Csv('bob,mary,susan'))->toArray()
        );
    }

    public function testToVOArray()
    {
        self::assertInstanceOf(
            VOArray::class,
            (new Csv('bob,mary,susan'))->toVOArray()
        );
    }
}
