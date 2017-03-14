<?php

namespace BestServedCold\PhalueObjects\String;

use BestServedCold\PhalueObjects\TestCase;
use BestServedCold\PhalueObjects\Mathematical\Integer;

class StringTraitTest extends TestCase
{
    use StringTrait;

    public function testIntegerToSpace()
    {
        self::assertEquals('    ', $this->integerToSpace(new Integer(4)));
        self::assertNotEquals('    ', $this->integerToSpace(new Integer(0)));
    }
}
