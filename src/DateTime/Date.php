<?php namespace BestServedCold\PhalueObjects\DateTime;

use BestServedCold\PhalueObjects\ValueObject\MultipleValue;
use BestServedCold\PhalueObjects\DateTime\Unit\Day\Month as Day;
use BestServedCold\PhalueObjects\DateTime\Unit\Month;
use BestServedCold\PhalueObjects\DateTime\Unit\Year;

class Date extends MultipleValue implements DateTimeInterface
{
    protected $year;
    protected $month;
    protected $day;
    protected $native;

    public function __construct(Year $year, Month $month, Day $day)
    {
        $this->year = $year;
        $this->month = $month;
        $this->day = $day;
        $this->native = new \DateTime("$year-$month-$day");
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
