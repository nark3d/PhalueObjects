<?php namespace BestServedCold\PhalueObjects;

use BestServedCold\PhalueObjects\DateTime\Date;
use BestServedCold\PhalueObjects\DateTime\DateTimeTrait;
use BestServedCold\PhalueObjects\DateTime\Time;
use BestServedCold\PhalueObjects\ValueObject\MultipleValue;

final class DateTime extends MultipleValue
{
    use DateTimeTrait;

    protected $date;
    protected $time;

    public function __construct(Date $date, Time $time)
    {
        $this->date = $date;
        $this->time = $time;
        parent::__construct([ $date, $time ]);
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
