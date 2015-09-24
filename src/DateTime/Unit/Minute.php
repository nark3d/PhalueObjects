<?php namespace BestServedCold\PhalueObjects\DateTime\Unit;

use BestServedCold\PhalueObjects\DateTime\DateTimeTrait;
use BestServedCold\PhalueObjects\Mathematical\Integer;

final class Minute extends Integer implements UnitInterface
{
    use DateTimeTrait;

    protected $minimum = 0;
    protected $maximum = 59;

    /**
     * @param integer $value
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
