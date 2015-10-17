<?php

namespace BestServedCold\PhalueObjects\DateTime;

use BestServedCold\PhalueObjects\DateTime\Unit\Hour;
use BestServedCold\PhalueObjects\DateTime\Unit\Minute;
use BestServedCold\PhalueObjects\DateTime\Unit\Second;
use BestServedCold\PhalueObjects\ValueObject\MultipleValue;

/**
 * Class Time
 *
 * @package   BestServedCold\PhalueObjects\DateTime
 * @author    Adam Lewis <adam.lewis@bestservedcold.com>
 * @copyright Copyright (c) 2015 Best Served Cold Media Limited
 * @license	  http://http://opensource.org/licenses/GPL-3.0 GPL License
 * @link	  http://bestservedcold.com
 * @since	  0.0.1-alpha
 * @version   0.0.2-alpha
 */
class Time extends MultipleValue implements DateTimeInterface
{
    use DateTimeTrait;

    /**
     * @var Hour
     */
    protected $hour;

    /**
     * @var Minute
     */
    protected $minute;

    /**
     * @var Second
     */
    protected $second;

    /**
     * @param Hour $hour
     * @param Minute $minute
     * @param Second $second
     */
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

    /**
     * @return static
     */
    public static function now()
    {
        return new static(Hour::now(), Minute::now(), Second::now());
    }

    /**
     * @param \DateTime $dateTime
     * @return static
     */
    public static function fromNative(\DateTime $dateTime)
    {
        return new static(
            new Hour((int) $dateTime->format('G')),
            new Minute((int) $dateTime->format('i')),
            new Second((int) $dateTime->format('s'))
        );
    }

    /**
     * @return Hour
     */
    public function getHour()
    {
        return $this->hour;
    }

    /**
     * @return Minute
     */
    public function getMinute()
    {
        return $this->minute;
    }

    /**
     * @return Second
     */
    public function getSecond()
    {
        return $this->second;
    }

    /**
     * @return int
     */
    public function getTimestamp()
    {
        return $this->timestamp->getValue();
    }

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->getTimestamp();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->hour . ':' . $this->minute . ':' . $this->second;
    }
}
