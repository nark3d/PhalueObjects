<?php namespace BestServedCold\PhalueObjects\DateTime\Unit;

use BestServedCold\PhalueObjects\DateTime\DateTimeTrait;

trait DayTrait
{
    use DateTimeTrait;

    /**
     * @return \BestServedCold\PhalueObjects\DateTime\Unit\DayInterface
     */
    public static function now()
    {
        return static::now();
    }

    public function isBeforeToday()
    {
        return $this->isBefore(self::now());
    }

    public function isBeforeOrIsToday()
    {
        return $this->isAfterOrIs(self::now());
    }

    public function isAfterToday()
    {
        return $this->isAfter(self::now());
    }

    public function isAfterOrIsToday()
    {
        return $this->isBeforeOrIs(self::now());
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