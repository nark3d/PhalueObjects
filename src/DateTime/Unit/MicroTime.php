<?php namespace BestServedCold\PhalueObjects\DateTime\Unit;

final class MicroTime
{
    public static function now()
    {
        return microtime(true);
    }
}