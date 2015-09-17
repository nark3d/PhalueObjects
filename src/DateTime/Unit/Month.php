<?php namespace BestServedCold\PhalueObjects\DateTime\Unit;

use BestServedCold\PhalueObjects\DateTime\Unit;

final class Month extends Unit implements UnitInterface
{
    const MIN = 1;
    const MAX = 12;

    public static function now()
    {
        return new static(parent::getNowDateTimeFormat('n'));
    }
}
