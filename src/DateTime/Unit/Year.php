<?php namespace PhalueObjects\DateTime\Unit;

use PhalueObjects\DateTime\Unit;

final class Year extends Unit implements UnitInterface
{
    public static function now()
    {
        return new static(parent::getNowDateTime()->format('Y'));
    }
}
