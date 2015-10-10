<?php namespace BestServedCold\PhalueObjects\Mathematical\Range;

use BestServedCold\PhalueObjects\TestCase;

class RangeTraitImplementation
{
    use RangeTrait;

    public function getMaximum()
    {
        return 100;
    }

    public function getMinimum()
    {
        return 1;
    }
}

class RangeTraitTest extends TestCase
{
    public function testConstructor()
    {
        $this->setExpectedException(
            'BestServedCold\PhalueObjects\Exception\InvalidRangeTypeException'
        );

        new RangeTraitImplementation(155);
    }
}
