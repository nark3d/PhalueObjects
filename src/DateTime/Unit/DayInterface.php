<?php namespace BestServedCold\PhalueObjects\DateTime\Unit;

use BestServedCold\PhalueObjects\DateTime\DateTimeInterface;

interface DayInterface extends DateTimeInterface
{
    public function nextDay();

    public function previousDay();
}
