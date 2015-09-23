<?php namespace BestServedCold\PhalueObjects\DateTime;

trait DateTimeTrait
{
    /**
     * @param string $format
     */
    public static function getNowDateTimeFormat($format)
    {
        return (int) self::getNowDateTime()->format($format);
    }

    public static function getDateTime($string)
    {
        return new \DateTime($string);
    }

    public static function getNowDateTime()
    {
        return self::getDateTime('now');
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

    public function isBeforeToday()
    {
        return $this->isLess(self::now());
    }

    public function isBeforeOrIsToday()
    {
        return $this->isLessOrEqual(self::now());
    }

    public function isAfterToday()
    {
        return $this->isGreater(self::now());
    }

    public function isAfterOrIsToday()
    {
        return $this->isGreaterOrEqual(self::now());
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
        return $this->addDay(1);
    }

    public function previousDay()
    {
        return $this->addDay(-1);
    }

    /**
     * @param integer $days
     */
    public function addDay($days)
    {
        $native = $this->cloneObject($this->native)->modify($days . ' day');
        return new Date(
            new Year($native->format('Y')),
            new Month($native->format('n')),
            new Day($native->format('j'))
        );
    }
}
