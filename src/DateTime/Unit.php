<?php namespace PhalueObjects\DateTime;

use PhalueObjects\Mathematical\ZeroPaddedInteger;

abstract class Unit extends ZeroPaddedInteger
{
    public static function getNowDateTime()
    {
        return new \DateTime('now');
    }
}
