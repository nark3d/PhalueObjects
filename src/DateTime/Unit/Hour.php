<?php namespace BestServedCold\PhalueObjects\DateTime\Unit;

use BestServedCold\PhalueObjects\DateTime\Unit;

final class Hour extends Unit implements UnitInterface
{
    const MIN = 0;
    const MAX = 23;

    public static function now()
    {
        return new static(parent::getNowDateTimeFormat('H'));
    }
}


