<?php namespace BestServedCold\PhalueObjects\DateTime\Unit;

use BestServedCold\PhalueObjects\Mathematical\Float;

final class MicroTime extends Float implements UnitInterface
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
     * From String
     *
     * @param  $string
     * @return static
     */
    public static function fromString($string)
    {
        // TODO: Implement fromString() method.
    }
}