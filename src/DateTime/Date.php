<?php namespace PhalueObjects\Date;

use PhalueObjects\AbstractObject\MultipleValueObject;
use PhalueObjects\DateTime\DateTimeInterface;
use PhalueObjects\DateTime\Unit\Day;
use PhalueObjects\DateTime\Unit\Month;
use PhalueObjects\DateTime\Unit\Year;

class Date extends MultipleValueObject implements DateTimeInterface
{
    protected $year;
    protected $month;
    protected $day;

    public function __construct(Year $year, Month $month, Day $day)
    {
        $this->year = $year;
        $this->month = $month;
        $this->day = $day;
    }

    public static function now()
    {
        return new static(Year::now(), Month::now(), Day::now());
    }

    public static function fromString($string)
    {

    }
}
