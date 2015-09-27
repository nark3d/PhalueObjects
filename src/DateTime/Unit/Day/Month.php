<?php

namespace BestServedCold\PhalueObjects\DateTime\Unit\Day;

use BestServedCold\PhalueObjects\DateTime\DateTimeTrait;
use BestServedCold\PhalueObjects\DateTime\Unit\UnitInterface;
use BestServedCold\PhalueObjects\Mathematical\Integer;

final class Month extends Integer implements UnitInterface
{
    use DateTimeTrait;

    protected $minimum = 1;
    protected $maximum = 31;

    public function __construct($value)
    {
        parent::__construct($value);
    }

    /**
     * @return static
     */
    public static function now()
    {
        return new static(self::getNowDateTimeFormat('j'));
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
        // TODO: Implement fromString() method.
    }
}
