<?php namespace BestServedCold\PhalueObjects;

use BestServedCold\PhalueObjects\ValueObject\MultipleValue;
use BestServedCold\PhalueObjects\Mathematical\Operator\OperatorInterface;
use BestServedCold\PhalueObjects\DateTime\Date;
use BestServedCold\PhalueObjects\DateTime\DateTimeTrait;
use BestServedCold\PhalueObjects\DateTime\Time;

final class DateTime extends MultipleValue implements OperatorInterface
{
    use DateTimeTrait;

    protected $date;
    protected $time;
    protected $timestamp;

    public function __construct(Date $date, Time $time)
    {
        $this->date = $date;
        $this->time = $time;
        $this->timestamp = $date->getTimestamp() + $time->getTimestamp();
        parent::__construct([ $date, $time ]);
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
