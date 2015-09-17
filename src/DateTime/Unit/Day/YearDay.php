<?php namespace BestServedCold\PhalueObjects\DateTime\Unit\Day;

use BestServedCold\PhalueObjects\DateTime\Unit;
use BestServedCold\PhalueObjects\DateTime\Unit\UnitInterface;
use BestServedCold\PhalueObjects\Exception\InvalidRangeTypeException;
use BestServedCold\PhalueObjects\Mathematical\Integer\IntegerTrait;

final class Year extends Unit implements UnitInterface
{
    use IntegerTrait;

    const MIN = 1;
    const MAX = 365;
    const LEAP = 366;

    public function __construct($value)
    {
        parent::__construct($value);

        if (!$this->inRange($this, self::MIN, self::MAX)) {
            throw new InvalidRangeTypeException($value, ['integer'], self::MIN, self::MAX);
        }
    }

    public static function now()
    {
        return new static(parent::getNowDateTime()->format('d'));
    }
}
