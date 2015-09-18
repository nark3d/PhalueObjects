<?php namespace BestServedCold\PhalueObjects\DateTime\Unit;

use BestServedCold\PhalueObjects\DateTime\Unit;
use BestServedCold\PhalueObjects\Exception\InvalidRangeTypeException;

final class Minute extends Unit implements UnitInterface
{
    const MIN = 0;
    const MAX = 59;

    public function __construct($value)
    {
        parent::__construct($value);

        if (!$this->inRange($this, self::MIN, self::MAX)) {
            throw new InvalidRangeTypeException(
                $value,
                ['integer'],
                self::MIN,
                self::MAX
            );
        }
    }

    public static function now()
    {
        return new static(Unit::getNowDateTimeFormat('i'));
    }
}
