<?php

namespace BestServedCold\PhalueObjects\DateTime;

use BestServedCold\PhalueObjects\Mathematical\Operator\ArithmeticTrait;
use BestServedCold\PhalueObjects\Mathematical\Operator\ComparisonTrait;
use BestServedCold\PhalueObjects\Mathematical\Operator\TypeTrait;

trait DateTimeTrait
{
    use ArithmeticTrait, ComparisonTrait, TypeTrait;

    public static function fromString($string)
    {
        $dateTime = new \DateTime($string);
        return static::fromNative($dateTime);
    }

    public static function fromTimestamp($timestamp)
    {
        return static::fromNative(self::getNowDateTime()->setTimestamp($timestamp));
    }

    public static function getNowDateTimeFormat($format)
    {
        return (int) self::getNowDateTime()->format($format);
    }

    public static function getDateTime($string = null)
    {
        return new \DateTime($string);
    }

    public static function getNowDateTime()
    {
        return self::getDateTime('now');
    }

    public function getNative()
    {
        return $this->native;
    }

    public function isBeforeToday()
    {
        return $this->isLessThan(static::now());
    }

    public function isBeforeOrIsToday()
    {
        return $this->isLessThanOrEqualTo(static::now());
    }

    public function isAfterToday()
    {
        return $this->isGreaterThan(static::now());
    }

    public function isAfterOrIsToday()
    {
        return $this->isGreaterThanOrEqualTo(static::now());
    }

    public static function tomorrow()
    {
        return static::now()->nextDay();
    }

    public static function yesterday()
    {
        return static::now()->previousDay();
    }

    public function nextDay()
    {
        return $this->addDay(1);
    }

    public function previousDay()
    {
        return $this->addDay(-1);
    }

    public function addDay($days)
    {
        return static::fromNative($this->native->modify($days . ' day'));
    }
}
