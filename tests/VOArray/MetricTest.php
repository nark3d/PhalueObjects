<?php

namespace BestServedCold\PhalueObjects\VOArray;

use BestServedCold\PhalueObjects\TestCase;
use BestServedCold\PhalueObjects\VOArray;

/**
 * Class MetricTest
 *
 * @package BestServedCold\PhalueObjects\VOArray
 */
class MetricTest extends TestCase
{
    public function testIsMultiDim()
    {
        self::assertTrue(VOArray::fromArray(['test' => ['multi' => ['is' => 'true']]])->isMultiDim());
        self::assertFalse(VOArray::fromArray(['this' => 'is', 'not' => 'multi'])->isMultiDim());
    }

    public function testGetDepth()
    {
        self::assertEquals(1, VOArray::fromArray(['this' => 'is', 'not' => 'multi'])->getDepth());
        self::assertEquals(
            3,
                VOArray::fromArray(['test' => ['multi' => ['is' => 'true']]])->getDepth()
        );
        self::assertEquals(
            4,
            VOArray::fromArray([
                'test' => 'this',
                'is' => [
                    'multi' => [
                        'but' => [
                            'has' => 'other stuff'
                        ]
                    ]
                ]
            ])->getDepth()
        );
    }
}
