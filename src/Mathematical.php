<?php

namespace BestServedCold\PhalueObjects;

use BestServedCold\PhalueObjects\Exception\InvalidRangeTypeException;
use BestServedCold\PhalueObjects\Mathematical\Operator\ArithmeticTrait;
use BestServedCold\PhalueObjects\Mathematical\Operator\ComparisonTrait;
use BestServedCold\PhalueObjects\Mathematical\Operator\TypeTrait;
use BestServedCold\PhalueObjects\Mathematical\Range;
use BestServedCold\PhalueObjects\ValueObject\SingleValue;

class Mathematical extends SingleValue
{
    use ComparisonTrait, TypeTrait, ArithmeticTrait;

    protected $maximum = false;
    protected $minimum = false;

    public function __construct($value)
    {
        if (
            $this->minimum &&
            $this->maximum &&
            !(new Range($this->maximum, $this->minimum))
                ->inRange(new self($value))) {
            throw new InvalidRangeTypeException(
                $value,
                ['Mathematical'],
                $this->minimum,
                $this->maximum
            );
        }

        parent::__construct($value);
    }
}
