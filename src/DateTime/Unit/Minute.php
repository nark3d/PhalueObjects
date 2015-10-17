<?php

namespace BestServedCold\PhalueObjects\DateTime\Unit;

use BestServedCold\PhalueObjects\DateTime\DateTimeInterface;
use BestServedCold\PhalueObjects\DateTime\DateTimeTrait;
use BestServedCold\PhalueObjects\Mathematical\Integer;
use BestServedCold\PhalueObjects\Mathematical\Range\RangeTrait;

/**
 * Class Minute
 *
 * @package   BestServedCold\PhalueObjects\DateTime\Unit
 * @author    Adam Lewis <adam.lewis@bestservedcold.com>
 * @copyright Copyright (c) 2015 Best Served Cold Media Limited
 * @license	  http://http://opensource.org/licenses/GPL-3.0 GPL License
 * @link	  http://bestservedcold.com
 * @since	  0.0.1-alpha
 * @version   0.0.2-alpha
 */
final class Minute extends Integer implements DateTimeInterface
{
    use DateTimeTrait, RangeTrait;

    /**
     * @param integer $value
     */
    public function __construct($value)
    {
        parent::__construct($value);
    }

    /**
     * @return static
     */
    public function getSeconds()
    {
        return $this->multiply(new Integer(60));
    }

    /**
     * @return static
     */
    public static function now()
    {
        return new static(self::getNowDateTimeFormat('i'));
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return str_pad($this->getValue(), 2, '0', STR_PAD_LEFT);
    }

    /**
     * From String.
     *
     * @param  $string
     *
     * @return static
     */
    public static function fromString($string)
    {
        return new static((int) $string);
    }

    /**
     * From Native
     *
     * @param \DateTime $native
     * @return DateTimeInterface
     */
    public static function fromNative(\DateTime $native)
    {
        return new static((int) $native->format('i'));
    }

    /**
     * @return int
     */
    public function getMaximum()
    {
        return 59;
    }

    /**
     * @return int
     */
    public function getMinimum()
    {
        return 0;
    }
}
