<?php namespace BestServedCold\PhalueObjects\DateTime;

use BestServedCold\PhalueObjects\DateTime\Unit\Hour;
use BestServedCold\PhalueObjects\DateTime\Unit\Minute;
use BestServedCold\PhalueObjects\DateTime\Unit\Second;
use BestServedCold\PhalueObjects\ValueObject\MultipleValue;

class Time extends MultipleValue implements DateTimeInterface
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

    public function equals()
    {
        // TODO: Implement equals() method.
    }

    /**
     * @return string
     */
    public function __toString()
    {
        // TODO: Implement __toString() method.
    }

    public static function fromString($string)
    {
        // TODO: Implement fromString() method.
    }
}
