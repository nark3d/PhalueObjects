<?php

namespace BestServedCold\PhalueObjects\DateTime\Unit\Day;

use BestServedCold\PhalueObjects\DateTime\DateTimeTrait;
use BestServedCold\PhalueObjects\DateTime\Unit\UnitInterface;
use BestServedCold\PhalueObjects\Mathematical\Integer;

final class Week extends Integer implements UnitInterface
{
    use DateTimeTrait;

    protected $minimum = 1;
    protected $maximum = 7;

    /**
     * @param int $value
     */
    public function __construct($value)
    {
        parent::__construct($value);
    }

    public static function now()
    {
        return new static(self::getNowDateTimeFormat('N'));
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
