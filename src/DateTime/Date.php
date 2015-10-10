<?php

namespace BestServedCold\PhalueObjects\DateTime;

use BestServedCold\PhalueObjects\DateTime\Unit\Day\Month as Day;
use BestServedCold\PhalueObjects\DateTime\Unit\DayInterface;
use BestServedCold\PhalueObjects\DateTime\Unit\DayTrait;
use BestServedCold\PhalueObjects\DateTime\Unit\Month;
use BestServedCold\PhalueObjects\DateTime\Unit\Year;
use BestServedCold\PhalueObjects\ValueObject\MultipleValue;

/**
 * Class Date
 *
 * @package   BestServedCold\PhalueObjects\DateTime
 * @author    Adam Lewis <adam.lewis@bestservedcold.com>
 * @copyright Copyright (c) 2015 Best Served Cold Media Limited
 * @license	  http://http://opensource.org/licenses/GPL-3.0 GPL License
 * @link	  http://bestservedcold.com
 * @since	  0.0.1-alpha
 * @version   0.0.2-alpha
 */
class Date extends MultipleValue implements DayInterface
{
    use DayTrait;

    /**
     * @var Year
     */
    protected $year;

    /**
     * @var Month
     */
    protected $month;

    /**
     * @var Day
     */
    protected $day;

    /**
     * @param Year $year
     * @param Month $month
     * @param Day $day
     */
    public function __construct(Year $year, Month $month, Day $day)
    {
        $this->year      = $year;
        $this->month     = $month;
        $this->day       = $day;
        $this->native    = new \DateTime($year . '-' . $month . '-' . $day);
        $this->timestamp = $this->native->getTimeStamp();
        parent::__construct([ $year, $month, $day ]);
    }

    /**
     * @return static
     */
    public static function now()
    {
        return new static(Year::now(), Month::now(), Day::now());
    }

    /**
     * @param \DateTime $dateTime
     * @return static
     */
    public static function fromNative(\DateTime $dateTime)
    {
        return new static(
            new Year((int) $dateTime->format('Y')),
            new Month((int) $dateTime->format('n')),
            new Day((int) $dateTime->format('j'))
        );
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->year . '-' . $this->month . '-' . $this->day;
    }

    /**
     * @return int
     */
    public function getValue()
    {
        return (int) $this->timestamp;
    }

    /**
     * @return Year
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @return Month
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * @return Day
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * @return bool
     */
    public function isWeekend()
    {
        return in_array($this->native->format('w'), [ 0, 6 ]);
    }

    /**
     * @return bool
     */
    public function isWeekDay()
    {
        return !$this->isWeekend();
    }

    /**
     * @return bool
     */
    public function isLeap()
    {
        return $this->year->isLeap();
    }
}
