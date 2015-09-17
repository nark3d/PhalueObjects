<?php namespace BestServedCold\PhalueObjects\DateTime;

use BestServedCold\PhalueObjects\Mathematical\Integer;

abstract class Unit extends Integer
{
    public static function getNowDateTimeFormat($format)
    {
        $dateTime = new \DateTime('now');
        return (int) $dateTime->format($format);
    }
}
