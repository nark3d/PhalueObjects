<?php

namespace BestServedCold\PhalueObjects\DateTime\Unit;

use BestServedCold\PhalueObjects\DateTime\DateTimeInterface;
use BestServedCold\PhalueObjects\Mathematical\Float;

final class MicroSecond extends Float implements DateTimeInterface
{
    public function __construct($value)
    {
        parent::__construct($value);
    }

    public static function now()
    {
        return microtime(true);
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
