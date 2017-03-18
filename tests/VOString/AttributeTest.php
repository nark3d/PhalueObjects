<?php

namespace BestServedCold\PhalueObjects\VOString;

use BestServedCold\PhalueObjects\TestCase;

/**
 * Class AttributeTest
 *
 * @package BestServedCold\PhalueObjects\Format
 */
class AttributeTest extends TestCase
{
    public function testFromArray()
    {
        self::assertEquals(
            'bob="mary" susan="harry"',
            Attribute::fromArray(
                ['bob' => 'mary', 'susan' => 'harry']
            )->getValue()
        );
    }
}
