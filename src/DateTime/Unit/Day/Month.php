<?php namespace BestServedCold\PhalueObjects\DateTime\Unit\Day;

use BestServedCold\PhalueObjects\DateTime\DateTimeTrait;
require_once('/home/vagrant/Code/PhalueObjects/src/DateTime/DateTimeTrait.php');
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
