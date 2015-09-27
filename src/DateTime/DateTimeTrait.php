<?php

namespace BestServedCold\PhalueObjects\DateTime;

use BestServedCold\PhalueObjects\DateTime\Unit\Day\Month as Day;
use BestServedCold\PhalueObjects\DateTime\Unit\Month;
use BestServedCold\PhalueObjects\DateTime\Unit\Year;
use BestServedCold\PhalueObjects\Mathematical\Operator\ArithmeticTrait;
use BestServedCold\PhalueObjects\Mathematical\Operator\ComparisonTrait;
use BestServedCold\PhalueObjects\Mathematical\Operator\TypeTrait;

trait DateTimeTrait
{
    use ArithmeticTrait, ComparisonTrait, TypeTrait;

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
        return self::now()->nextDay();
    }

    public static function yesterday()
    {
        return self::now()->previousDay();
    }

    public function nextDay()
    {
        return new static($this->addDay(1));
    }

    public function previousDay()
    {
        return new static($this->addDay(-1));
    }

    public function addDay($days)
    {
        $this->native->modify($days.' day');

        return new static(
            new Year($this->native->format('Y')),
            new Month($this->native->format('n')),
            new Day($this->native->format('j'))
        );
    }
}
