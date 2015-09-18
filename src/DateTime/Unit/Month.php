<?php namespace BestServedCold\PhalueObjects\DateTime\Unit;

use BestServedCold\PhalueObjects\DateTime\Unit;
use BestServedCold\PhalueObjects\Exception\InvalidRangeTypeException;

final class Month extends Unit implements UnitInterface
{
    const MIN = 1;
    const MAX = 12;

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
        return new static(Unit::getNowDateTimeFormat('n'));
    }
}
