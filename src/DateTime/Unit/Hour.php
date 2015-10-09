<?php

namespace BestServedCold\PhalueObjects\DateTime\Unit;

use BestServedCold\PhalueObjects\DateTime\DateTimeInterface;
use BestServedCold\PhalueObjects\DateTime\DateTimeTrait;
use BestServedCold\PhalueObjects\Mathematical\Integer;

final class Hour extends Integer implements DateTimeInterface
{
    use DateTimeTrait;

    protected $minimum = 0;
    protected $maximum = 23;

    /**
     * @param int $value
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
}
