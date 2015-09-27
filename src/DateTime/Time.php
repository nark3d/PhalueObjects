<?php

namespace BestServedCold\PhalueObjects\DateTime;

use BestServedCold\PhalueObjects\DateTime\Unit\Hour;
use BestServedCold\PhalueObjects\DateTime\Unit\Minute;
use BestServedCold\PhalueObjects\DateTime\Unit\Second;
use BestServedCold\PhalueObjects\Mathematical\Operator\ComparisonTrait;
use BestServedCold\PhalueObjects\Mathematical\Operator\ArithmeticTrait;
use BestServedCold\PhalueObjects\ValueObject\MultipleValue;

class Time extends MultipleValue implements DateTimeInterface
{
    use ComparisonTrait;
    use ArithmeticTrait;

    protected $hour;
    protected $minute;
    protected $second;
    protected $timestamp;
    protected $native;

    public function __construct(Hour $hour, Minute $minute, Second $second)
    {
        $this->hour = $hour;
        $this->minute = $minute;
        $this->second = $second;
        $this->timestamp = $hour->getSeconds()
            ->add($minute->getSeconds())
            ->add($second);
        $this->native = new \DateTime();
        parent::__construct(func_get_args());
    }

    public function getHour()
    {
        return $this->hour;
    }

    public function getMinute()
    {
        return $this->minute;
    }

    public function getSecond()
    {
        return $this->second;
    }

    public function getTimestamp()
    {
        return $this->timestamp->getValue();
    }

    public function getValue()
    {
        return $this->timestamp->getValue();
    }

    public static function now()
    {
        return new static(Hour::now(), Minute::now(), Second::now());
    }

    /**
     * @return string
     */
    public function __toString()
    {
    }

    public static function fromString($string)
    {
    }
}
