<?php

namespace BestServedCold\PhalueObjects;

use BestServedCold\PhalueObjects\DateTime\Unit\DayInterface;
use BestServedCold\PhalueObjects\DateTime\Unit\DayTrait;
use BestServedCold\PhalueObjects\ValueObject\MultipleValue;
use BestServedCold\PhalueObjects\DateTime\Date;
use BestServedCold\PhalueObjects\DateTime\Time;
use BestServedCold\PhalueObjects\DateTime\Unit\Year;
use BestServedCold\PhalueObjects\DateTime\Unit\Month;
use BestServedCold\PhalueObjects\DateTime\Unit\Day\Month as Day;
use BestServedCold\PhalueObjects\DateTime\Unit\Hour;
use BestServedCold\PhalueObjects\DateTime\Unit\Minute;
use BestServedCold\PhalueObjects\DateTime\Unit\Second;

/**
 * Class DateTime
 *
 * @package   BestServedCold\PhalueObjects
 * @author    Adam Lewis <adam.lewis@bestservedcold.com>
 * @copyright Copyright (c) 2015 Best Served Cold Media Limited
 * @license	  http://http://opensource.org/licenses/GPL-3.0 GPL License
 * @link	  http://bestservedcold.com
 * @since	  0.0.1-alpha
 * @version   0.0.2-alpha
 */
final class DateTime extends MultipleValue implements DayInterface
{
    use DayTrait;


    protected $date;
    protected $time;

    public function __construct(Date $date, Time $time)
    {
        $this->date = $date;
        $this->time = $time;
        $this->timestamp = (int) $date->getTimestamp() + (int) $time->getTimestamp();
        $this->native = self::getDateTime($date . ' ' . $time);
        parent::__construct([ $date, $time ]);
    }

    public static function now()
    {
        return new self(Date::now(), Time::now());
    }

    public static function fromNative(\DateTime $dateTime)
    {
        return new static(
            new Date(
                new Year((int) $dateTime->format('Y')),
                new Month((int) $dateTime->format('n')),
                new Day((int) $dateTime->format('j'))
            ),
            new Time(
                new Hour((int) $dateTime->format('G')),
                new Minute((int) $dateTime->format('i')),
                new Second((int) $dateTime->format('s'))
            )
        );
    }

    public function getValue()
    {
        return $this->timestamp;
    }

    public static function fromTimestamp($timestamp)
    {
        return self::fromNative((new \DateTime())->setTimestamp($timestamp));
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
