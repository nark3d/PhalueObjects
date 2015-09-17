<?php namespace BestServedCold\PhalueObjects\DateTime\Unit;

use BestServedCold\PhalueObjects\DateTime\Unit;

final class Year extends Unit implements UnitInterface
{
    public static function now()
    {
        return new static(parent::getNowDateTime()->format('Y'));
    }
}
