<?php

namespace BestServedCold\PhalueObjects\DateTime;

use BestServedCold\PhalueObjects\DateTime\Unit\Hour;
use BestServedCold\PhalueObjects\DateTime\Unit\Minute;
use BestServedCold\PhalueObjects\DateTime\Unit\Second;
use BestServedCold\PhalueObjects\ValueObject\MultipleValue;

class Time extends MultipleValue implements DateTimeInterface
{
    use DateTimeTrait;

    protected $hour;
    protected $minute;
    protected $second;

    public function __construct(Hour $hour, Minute $minute, Second $second)
    {
        $this->hour = $hour;
        $this->minute = $minute;
        $this->second = $second;
        $this->timestamp = $hour->getSeconds()->add($minute->getSeconds())->add($second);
        $this->native = self::getNowDateTime()
            ->setTime($hour->getValue(), $minute->getValue(), $minute->getValue()
        );
        parent::__construct(func_get_args());
    }

    public static function now()
    {
        return new static(Hour::now(), Minute::now(), Second::now());
    }

    public static function fromNative(\DateTime $dateTime)
    {
        return new static(
            new Hour((int) $dateTime->format('G')),
            new Minute((int) $dateTime->format('i')),
            new Second((int) $dateTime->format('s'))
        );
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

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->hour . ':' . $this->minute . ':' . $this->second;
    }
}
