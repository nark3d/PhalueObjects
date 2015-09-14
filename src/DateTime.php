<?php namespace PhalueObjects;

use PhalueObjects\AbstractObject\MultipleValueObject;
use PhalueObjects\DateTime\Time;
use PhalueObjects\DateTime\Date;

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
}
