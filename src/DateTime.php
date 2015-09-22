<?php namespace BestServedCold\PhalueObjects;

use BestServedCold\PhalueObjects\ValueObject\MultipleValue;
use BestServedCold\PhalueObjects\DateTime\Time;
use BestServedCold\PhalueObjects\DateTime\Date;

final class DateTime extends MultipleValue
{
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

    /**
     * @return string
     */
    public function __toString()
    {
        return "$this->date $this->time";
    }
}
