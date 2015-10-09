<?php

namespace BestServedCold\PhalueObjects\DateTime;

use BestServedCold\PhalueObjects\Mathematical\Operator\ArithmeticTrait;
use BestServedCold\PhalueObjects\Mathematical\Operator\ComparisonTrait;
use BestServedCold\PhalueObjects\Mathematical\Operator\TypeTrait;

trait DateTimeTrait
{
    use ArithmeticTrait, ComparisonTrait, TypeTrait;

    /**
     * @var \DateTime
     */
    protected $native;

    protected $timestamp;

    public static function fromString($string)
    {
        return static::fromNative(new \DateTime($string));
    }

    public static function fromTimestamp($timestamp)
    {
        return static::fromNative(static::getNowDateTime()->setTimestamp($timestamp));
    }

    public static function getNowDateTimeFormat($format)
    {
        return (int) static::getNowDateTime()->format($format);
    }

    public static function getDateTime($string = null)
    {
        return new \DateTime($string);
    }

    public static function getNowDateTime()
    {
        return static::getDateTime('now');
    }

    public function getNative()
    {
        return $this->native;
    }

    public function getTimestamp()
    {
        return $this->timestamp;
    }

    public function isBefore(DateTimeInterface $object)
    {
        return $this->isLessThan($object);
    }

    public function isAfter(DateTimeInterface $object)
    {
        return $this->isGreaterThan($object);
    }

    public function isAfterOrIs(DateTimeInterface $object)
    {
        return $this->isLessThanOrEqualTo($object);
    }

    public function isBeforeOrIs(DateTimeInterface $object)
    {
        return $this->isGreaterThanOrEqualTo($object);
    }
}
