<?php

namespace BestServedCold\PhalueObjects\VOString;

use BestServedCold\PhalueObjects\TestCase;
use BestServedCold\PhalueObjects\Mathematical\Integer;

/**
 * Class StringTraitTest
 *
 * @package BestServedCold\PhalueObjects\String
 */
class StringTraitTest extends TestCase
{
    use StringTrait;

    public function testIntegerToSpace()
    {
        self::assertEquals('    ', $this->integerToSpace(new Integer(4)));
        self::assertNotEquals('    ', $this->integerToSpace(new Integer(0)));
    }
}
