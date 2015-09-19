<?php namespace BestServedCold\PhalueObjects\DateTime;

trait DateTimeTrait
{
    public static function getNowDateTimeFormat($format)
    {
        return (int) self::getNowDateTime()->format($format);
    }

    public static function getNowDateTime()
    {
        return new \DateTime('now');
    }
}