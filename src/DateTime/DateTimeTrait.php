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

    public function isLess(Date $date)
    {
        return $this->getTimestamp() < $date->getTimestamp();
    }

    public function isLessOrEqual(Date $date)
    {
        return $this->isLess($date) || $this->equals($date);
    }

    public function isGreater(Date $date)
    {
        return $this->getTimestamp() > $date->getTimestamp();
    }

    public function isGreaterOrEqual(Date $date)
    {
        return $this->isLess($date) || $this->equals($date);
    }
}