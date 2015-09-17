<?php namespace BestServedCold\PhalueObjects\DateTime\Unit;

use BestServedCold\PhalueObjects\DateTime\Unit;

final class Second extends Unit implements UnitInterface
{
    const MIN = 0;
    const MAX = 59;

    public static function now()
    {
        return new static(parent::getNowDateTime()->format('s'));
    }
}
