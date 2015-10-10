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
}
