<?php

namespace BestServedCold\PhalueObjects;

use BestServedCold\PhalueObjects\DateTime\Date;
use BestServedCold\PhalueObjects\DateTime\Time;
use BestServedCold\PhalueObjects\Contract\DateTime\Day as DayInterface;
use BestServedCold\PhalueObjects\DateTime\Unit\DayTrait;
use BestServedCold\PhalueObjects\DateTime\Unit\Day\Month as Day;
use BestServedCold\PhalueObjects\DateTime\Unit\Hour;
use BestServedCold\PhalueObjects\DateTime\Unit\Minute;
use BestServedCold\PhalueObjects\DateTime\Unit\Month;
use BestServedCold\PhalueObjects\DateTime\Unit\Second;
use BestServedCold\PhalueObjects\DateTime\Unit\Year;

/**
 * Class DateTime
 *
 * @package   BestServedCold\PhalueObjects
 * @author    Adam Lewis <adam.lewis@bestservedcold.com>
 * @copyright Copyright (c) 2015 Best Served Cold Media Limited
 * @license      http://http://opensource.org/licenses/GPL-3.0 GPL License
 * @link      http://bestservedcold.com
 * @since      0.0.1-alpha
 * @version   0.0.2-alpha
 */
final class DateTime extends Variadic implements DayInterface
{
    use DayTrait;

    protected $date;
    protected $time;

    /**
     * @param Date $date
     * @param Time $time
     */
    public function __construct(Date $date, Time $time)
    {
        $this->date      = $date;
        $this->time      = $time;
        $this->timestamp = (int) $date->getTimestamp() + (int) $time->getTimestamp();
        $this->native    = self::getDateTime($date.' '.$time);
        parent::__construct($date, $time);
    }

    /**
     * @return DateTime
     */
    public static function now()
    {
        return new self(Date::now(), Time::now());
    }

    /**
     * @param \DateTime $dateTime
     * @return static
     */
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

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->timestamp;
    }

    /**
     * @param $timestamp
     * @return DateTime
     */
    public static function fromTimestamp($timestamp)
    {
        return self::fromNative((new \DateTime())->setTimestamp($timestamp));
    }

    /**
     * @return Date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return Time
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->date.' '.$this->time;
    }
}
