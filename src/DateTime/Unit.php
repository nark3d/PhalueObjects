<?php namespace BestServedCold\PhalueObjects\DateTime;

use BestServedCold\PhalueObjects\Mathematical\Integer;
use BestServedCold\PhalueObjects\Mathematical\Integer\IntegerTrait;

class Unit extends Integer
{
    use IntegerTrait;

    public static function getNowDateTimeFormat($format)
    {
        $dateTime = new \DateTime('now');
        return (int) $dateTime->format($format);
    }
}
