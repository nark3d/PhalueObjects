<?php namespace BestServedCold\PhalueObjects\Date;

use BestServedCold\PhalueObjects\AbstractObject\MultipleValueObject;
use BestServedCold\PhalueObjects\DateTime\DateTimeInterface;
use BestServedCold\PhalueObjects\DateTime\Unit\Day;
use BestServedCold\PhalueObjects\DateTime\Unit\Month;
use BestServedCold\PhalueObjects\DateTime\Unit\Year;

class Date extends MultipleValueObject implements DateTimeInterface
{
    protected $year;
    protected $month;
    protected $day;
    protected $dateTime;

    public function __construct(Year $year, Month $month, Day $day)
    {
        $this->year = $year;
        $this->month = $month;
        $this->day = $day;
        $this->dateTime = new DateTime("$year-$month-$day");
    }

    public static function now()
    {
        return new static(Year::now(), Month::now(), Day::now());
    }

    public static function fromString($string)
    {
        $date = new \DateTime(preg_replace('/\//', '-', $string));

        return $date ? new static(
            new Year($date->format('Y')),
            new Month($date->format('n')),
            new Day($date->format('j'))) : false;
    }

    public function __toString()
    {
        return $this->year . '-' . $this->month . '-' . $this->day;
    }
}
