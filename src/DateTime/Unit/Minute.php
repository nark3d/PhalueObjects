<?php

namespace BestServedCold\PhalueObjects\DateTime\Unit;

use BestServedCold\PhalueObjects\DateTime\DateTimeInterface;
use BestServedCold\PhalueObjects\DateTime\DateTimeTrait;
use BestServedCold\PhalueObjects\Mathematical\Integer;

final class Minute extends Integer implements DateTimeInterface
{
    use DateTimeTrait;

    protected $minimum = 0;
    protected $maximum = 59;

    /**
     * @param int $value
     */
    public function __construct($value)
    {
        parent::__construct($value);
    }

    public function getSeconds()
    {
        return $this->multiply(new Integer(60));
    }

    public static function now()
    {
        return new static(self::getNowDateTimeFormat('i'));
    }


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

    }
}
