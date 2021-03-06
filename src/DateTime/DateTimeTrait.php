<?php

namespace BestServedCold\PhalueObjects\DateTime;

use BestServedCold\PhalueObjects\Mathematical\Operator\ArithmeticTrait;
use BestServedCold\PhalueObjects\Mathematical\Operator\ComparisonTrait;
use BestServedCold\PhalueObjects\Mathematical\Operator\TypeTrait;
use BestServedCold\PhalueObjects\Contract\DateTime as DateTimeInterface;

/**
 * Class DateTimeTrait
 *
 * @package BestServedCold\PhalueObjects\DateTime
 * @author    Adam Lewis <adam.lewis@bestservedcold.com>
 * @copyright Copyright (c) 2015 Best Served Cold Media Limited
 * @license   http://http://opensource.org/licenses/GPL-3.0 GPL License
 * @link      http://bestservedcold.com
 * @since     0.0.1-alpha
 * @version   0.0.2-alpha
 */
trait DateTimeTrait
{
    use ArithmeticTrait, ComparisonTrait, TypeTrait;

    /**
     * @var \DateTime
     */
    protected $native;

    /**
     * @var int
     */
    protected $timestamp;

    /**
     * @param $string
     * @return mixed
     */
    public static function fromString($string)
    {
        return static::fromNative(new \DateTime($string));
    }

    /**
     * @param $timestamp
     * @return mixed
     */
    public static function fromTimestamp($timestamp)
    {
        return static::fromNative(static::getNowDateTime()->setTimestamp($timestamp));
    }

    /**
     * @param string $format
     * @return int
     */
    public static function getNowDateTimeFormat($format)
    {
        return (int) static::getNowDateTime()->format($format);
    }

    /**
     * @param string $string
     * @return \DateTime
     */
    public static function getDateTime($string = null)
    {
        return new \DateTime($string);
    }

    /**
     * @return \DateTime
     */
    public static function getNowDateTime()
    {
        return static::getDateTime('now');
    }

    /**
     * @return \DateTime
     */
    public function getNative()
    {
        return $this->native;
    }

    /**
     * @return int
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param DateTimeInterface $object
     * @return bool
     */
    public function isBefore(DateTimeInterface $object)
    {
        return $this->isLessThan($object);
    }

    /**
     * @param DateTimeInterface $object
     * @return bool
     */
    public function isAfter(DateTimeInterface $object)
    {
        return $this->isGreaterThan($object);
    }

    /**
     * @param DateTimeInterface $object
     * @return bool
     */
    public function isAfterOrIs(DateTimeInterface $object)
    {
        return $this->isLessThanOrEqualTo($object);
    }

    /**
     * @param DateTimeInterface $object
     * @return bool
     */
    public function isBeforeOrIs(DateTimeInterface $object)
    {
        return $this->isGreaterThanOrEqualTo($object);
    }
}
