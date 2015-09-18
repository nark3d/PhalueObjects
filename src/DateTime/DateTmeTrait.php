<?php namespace BestServedCold\PhalueObjects\DateTime;

trait DateTimeTrait
{
    public static function getNowDateTimeFormat($format)
    {
        $dateTime = new \DateTime('now');
        return (int) $dateTime->format($format);
    }

    public static function getNowDateTime()
    {
        return new \DateTime('now');
    }
}