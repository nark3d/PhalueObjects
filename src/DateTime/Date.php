<?php namespace BestServedCold\PhalueObjects\DateTime;

use BestServedCold\PhalueObjects\ValueObject\MultipleValue;
use BestServedCold\PhalueObjects\DateTime\Unit\Day\Month as Day;
use BestServedCold\PhalueObjects\DateTime\Unit\Month;
use BestServedCold\PhalueObjects\DateTime\Unit\Year;

class Date extends MultipleValue implements DateTimeInterface
{
    use DateTimeTrait;

    protected $year;
    protected $month;
    protected $day;
    protected $native;
    protected $timestamp;

    public function __construct(Year $year, Month $month, Day $day)
    {
        $this->year = $year;
        $this->month = $month;
        $this->day = $day;
        $this->native = new \DateTime("$year-$month-$day");
        $this->timestamp = $this->native->getTimeStamp();
        parent::__construct([$year, $month, $day]);
    }

    public function getYear()
    {
        return $this->year;
    }

    public function getMonth()
    {
        return $this->month;
    }

    public function getDay()
    {
        return $this->day;
    }

    public function getTimestamp()
    {
        return $this->timestamp;
    }

    public function getNative()
    {
        return $this->native;
    }

    /**
     * @todo
     */
    public function isWeekend()
    {
        return in_array($this->native->format('w'), [0,6]);
    }

    public function isWeekDay()
    {
        return ! $this->isWeekend();
    }

    public function isLeap()
    {
        return $this->year->isLeap();
    }

    public function __toString()
    {
        return $this->year . '-' . $this->month . '-' . $this->day;
    }

    public static function fromString($string)
    {
        return self::fromNative(self::getDateTime(preg_replace('/\//', '-', $string)));
    }

    public static function fromTimestamp($timestamp)
    {
        return self::fromNative(self::getNowDateTime()->setTimestamp($timestamp));
    }

    public static function fromNative(\DateTime $dateTime)
    {
        return new static(
            new Year((int) $dateTime->format('Y')),
            new Month((int) $dateTime->format('n')),
            new Day((int) $dateTime->format('j'))
        );
    }

    public static function now()
    {
        return new static(Year::now(), Month::now(), Day::now());
    }


}
