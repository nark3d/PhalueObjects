<?php

namespace BestServedCold\PhalueObjects\DateTime\Unit;

use BestServedCold\PhalueObjects\DateTime\DateTimeInterface;
use BestServedCold\PhalueObjects\DateTime\DateTimeTrait;
use BestServedCold\PhalueObjects\Mathematical\Integer;
use BestServedCold\PhalueObjects\Mathematical\Range\RangeTrait;

/**
 * Class Hour
 *
 * @package   BestServedCold\PhalueObjects\DateTime\Unit
 * @author    Adam Lewis <adam.lewis@bestservedcold.com>
 * @copyright Copyright (c) 2015 Best Served Cold Media Limited
 * @license	  http://http://opensource.org/licenses/GPL-3.0 GPL License
 * @link	  http://bestservedcold.com
 * @since	  0.0.1-alpha
 * @version   0.0.2-alpha
 */
final class Hour extends Integer implements DateTimeInterface
{
    use DateTimeTrait, RangeTrait;

    /**
     * @param integer $value
     */
    public function __construct($value)
    {
        parent::__construct($value);
    }

    public function getSeconds()
    {
        return $this->multiply(new Integer(3600));
    }

    /**
     * From String.
     *
     * @param  $string
     * @return static
     */
    public static function fromString($string)
    {
        return new static((int) $string);
    }

    public static function now()
    {
        return new static(self::getNowDateTimeFormat('H'));
    }

    public function __toString()
    {
        return str_pad($this->getValue(), 2, '0', STR_PAD_LEFT);
    }

    /**
     * From Native
     *
     * @param \DateTime $native
     * @return DateTimeInterface
     */
    public static function fromNative(\DateTime $native)
    {
        return new static((int) $native->format('G'));
    }

    public function getMaximum()
    {
        return 23;
    }

    public function getMinimum()
    {
        return 0;
    }

}
