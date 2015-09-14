<?php namespace PhalueObjects\DateTime;

use PhalueObjects\AbstractObject\MultipleValueObject;
use PhalueObjects\DateTime\Unit\Hour;
use PhalueObjects\DateTime\Unit\Minute;
use PhalueObjects\DateTime\Unit\Second;

class Time extends MultipleValueObject implements DateTimeInterface
{
    protected $hour;
    protected $minute;
    protected $second;

    public function __construct(Hour $hour, Minute $minute, Second $second)
    {
        $this->hour = $hour;
        $this->minute = $minute;
        $this->second = $second;
    }

    public static function now()
    {
        return new static(Hour::now(), Minute::now(), Second::now());
    }

    public static function fromString()
    {
        // TODO: Implement fromString() method.
    }

    public function equals()
    {
        // TODO: Implement equals() method.
    }
}
