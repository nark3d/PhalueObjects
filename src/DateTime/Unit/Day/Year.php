<?php namespace BestServedCold\PhalueObjects\DateTime\Unit\Day;

use BestServedCold\PhalueObjects\DateTime\DateTimeTrait;
use BestServedCold\PhalueObjects\DateTime\Unit\UnitInterface;
use BestServedCold\PhalueObjects\Mathematical\Integer;

final class Year extends Integer implements UnitInterface
{
    use DateTimeTrait;

    /**
     * @param integer $value
     */
    public function __construct($value)
    {
        parent::__construct($value);
    }

    public static function now()
    {
        return new static(self::getNowDateTimeFormat('z'));
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
