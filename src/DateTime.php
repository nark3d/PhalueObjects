<?php

namespace BestServedCold\PhalueObjects;

use BestServedCold\PhalueObjects\ValueObject\MultipleValue;
use BestServedCold\PhalueObjects\DateTime\DateTimeTrait;
use BestServedCold\PhalueObjects\DateTime\Date;
use BestServedCold\PhalueObjects\DateTime\Time;
use BestServedCold\PhalueObjects\DateTime\Unit\Year;
use BestServedCold\PhalueObjects\DateTime\Unit\Month;
use BestServedCold\PhalueObjects\DateTime\Unit\Day\Month as Day;
use BestServedCold\PhalueObjects\DateTime\Unit\Hour;
use BestServedCold\PhalueObjects\DateTime\Unit\Minute;
use BestServedCold\PhalueObjects\DateTime\Unit\Second;

final class DateTime extends MultipleValue
{
    use DateTimeTrait;

    protected $date;
    protected $time;
    protected $native;
    protected $timestamp;

    public function __construct(Date $date, Time $time)
    {
        $this->date = $date;
        $this->time = $time;
        $this->timestamp = $date->getTimestamp() + $time->getTimestamp();
        $this->native = self::getDateTime($date . ' ' . $time);
        parent::__construct([ $date, $time ]);
    }

    public static function fromNative(\DateTime $dateTime)
    {
        return new static(
            new Date(
                new Year((int) $dateTime->format('Y')),
                new Month((int) $dateTime->format('n')),
                new Day((int) $dateTime->format('j'))
            ),
            new Time(
                new Hour((int) $dateTime->format('G')),
                new Minute((int) $dateTime->format('i')),
                new Second((int) $dateTime->format('s'))
            )
        );
    }

    public function getValue()
    {
        return $this->timestamp;
    }

    public static function now()
    {
        return new static(Date::now(), Time::now());
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getTime()
    {
        return $this->time;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "$this->date $this->time";
    }
}
