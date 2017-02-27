<?php

namespace BestServedCold\PhalueObjects\Format;

use BestServedCold\PhalueObjects\ValueObject;

abstract class Byte extends ValueObject
{
    private $units = ["Bytes", "KB", "MB", "GB", "TB", "PB", "EB", "ZB", "YB"];
    protected $power;

    public static function fromBytes($bytes)
    {
        return new static($bytes);
    }

    /**
     * @return float
     */
    private function base()
    {
        return log($this->getValue(), $this->power);
    }

    public function getUnit()
    {
        return $this->units[ (int) floor($this->base()) ];
    }

    public function power($precision = 2)
    {
        return round(pow(1024, $this->base() - floor($this->base())), $precision);
    }

    public function __toString()
    {
        return $this->getValue() ? $this->power() . ' ' . $this->getUnit() : '0 bytes';
    }      
}
