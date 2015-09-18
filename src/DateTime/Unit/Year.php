<?php namespace BestServedCold\PhalueObjects\DateTime\Unit;

use BestServedCold\PhalueObjects\DateTime\Unit;

final class Year extends Unit implements UnitInterface
{
    protected $native;

    public function __construct($value)
    {
        parent::__construct($value);
        $this->native = new \DateTime("$value-01-01");
    }

    public static function now()
    {
        return new static(parent::getNowDateTimeFormat('Y'));
    }

    public function leap()
    {
        return $this->native->format('L') === '1' ? true : false;
    }


}


