<?php

namespace BestServedCold\PhalueObjects\DateTime\Unit;

use BestServedCold\PhalueObjects\DateTime\DateTimeTrait;
use BestServedCold\PhalueObjects\Mathematical\Integer;

final class Month extends Integer implements UnitInterface
{
    use DateTimeTrait;

    protected $minimum = 1;
    protected $maximum = 12;

    /**
     * @param int $value
     */
    public function __construct($value)
    {
        parent::__construct($value);
    }

    public static function now()
    {
        return new static(self::getNowDateTimeFormat('n'));
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
