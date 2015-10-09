<?php namespace BestServedCold\PhalueObjects\DateTime\Unit;

use BestServedCold\PhalueObjects\DateTime\DateTimeTrait;

trait DayTrait
{
    use DateTimeTrait;

    public function isBeforeToday()
    {
        return $this->isBefore(static::now());
    }

    public function isBeforeOrIsToday()
    {
        return $this->isAfterOrIs(static::now());
    }

    public function isAfterToday()
    {
        return $this->isAfter(static::now());
    }

    public function isAfterOrIsToday()
    {
        return $this->isBeforeOrIs(static::now());
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