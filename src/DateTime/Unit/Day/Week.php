<?php

namespace BestServedCold\PhalueObjects\DateTime\Unit\Day;

use BestServedCold\PhalueObjects\DateTime\DateTimeInterface;
use BestServedCold\PhalueObjects\DateTime\DateTimeTrait;
use BestServedCold\PhalueObjects\Mathematical\Integer;
use BestServedCold\PhalueObjects\Mathematical\Range\RangeTrait;

/**
 * Class Week
 *
 * @package   BestServedCold\PhalueObjects\DateTime\Unit\Day
 * @author    Adam Lewis <adam.lewis@bestservedcold.com>
 * @copyright Copyright (c) 2015 Best Served Cold Media Limited
 * @license	  http://http://opensource.org/licenses/GPL-3.0 GPL License
 * @link	  http://bestservedcold.com
 * @since	  0.0.1-alpha
 * @version   0.0.2-alpha
 */
final class Week extends Integer implements DateTimeInterface
{
    use DateTimeTrait, RangeTrait;

    protected $minimum = 1;
    protected $maximum = 7;

    /**
     * @return static
     */
    public static function now()
    {
        return new static(static::getNowDateTimeFormat('N'));
    }

    /**
     * From String.
     *
     * @param  $string
     * @return static
     */
    public static function fromString($string)
    {
        return ctype_digit($string)
            ? new static((int) $string)
            : self::fromNative(new \DateTime($string));
    }

    /**
     * From Native
     *
     * @param \DateTime $native
     * @return DateTimeInterface
     */
    public static function fromNative(\DateTime $native)
    {
        return new static((int) $native->format('N'));
    }

    public function getMaximum()
    {
        return $this->maximum;
    }

    public function getMinimum()
    {
        return $this->minimum;
    }
}
