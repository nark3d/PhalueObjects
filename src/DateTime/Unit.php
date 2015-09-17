<?php namespace BestServedCold\PhalueObjects\DateTime;

use BestServedCold\PhalueObjects\Mathematical\Integer;

abstract class Unit extends Integer
{
    public static function getNowDateTime()
    {
        return new \DateTime('now');
    }
}
