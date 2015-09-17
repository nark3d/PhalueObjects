<?php namespace BestServedCold\PhalueObjects;

use BestServedCold\PhalueObjects\AbstractObject\MultipleValueObject;
use BestServedCold\PhalueObjects\DateTime\Time;
use BestServedCold\PhalueObjects\DateTime\Date;

final class DateTime extends MultipleValueObject
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
        // TODO: Implement __toString() method.
    }
}
