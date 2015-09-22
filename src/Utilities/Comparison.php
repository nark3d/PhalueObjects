<?php namespace BestServedCold\PhalueObjects\Utilities;

trait Comparison
{
    public function isLess(Date $date)
    {
        return $this->getTimestamp() < $date->getTimestamp();
    }

    public function isLessOrEqual(Date $date)
    {
        return $this->isLess($date) || $this->equals($date);
    }

    public function isGreater(Date $date)
    {
        return $this->getTimestamp() > $date->getTimestamp();
    }

    public function isGreaterOrEqual(Date $date)
    {
        return $this->isLess($date) || $this->equals($date);
    }
}