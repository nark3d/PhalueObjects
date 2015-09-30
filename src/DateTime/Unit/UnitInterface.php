<?php

namespace BestServedCold\PhalueObjects\DateTime\Unit;

use BestServedCold\PhalueObjects\DateTime\DateTimeInterface;

interface UnitInterface extends DateTimeInterface
{
    /**
     * Class Constructor.
     *
     * @param $value
     * @return void
     */
    public function __construct($value);
}
