<?php

namespace BestServedCold\PhalueObjects\Format;

use BestServedCold\PhalueObjects\ValueObject;

abstract class Byte extends ValueObject
{
    /**
     * @var array $units
     */
    private $units = ["Bytes", "KB", "MB", "GB", "TB", "PB", "EB", "ZB", "YB"];

    /**
     * @var integer $power
     */
    protected $power;

    /**
     * @param  integer $bytes
     * @return static
     */
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

    /**
     * @return string
     */
    public function getUnit()
    {
        return $this->units[ (int) floor($this->base()) ];
    }

    /**
     * @param  int $precision
     * @return float
     */
    public function power($precision = 2)
    {
        return round(pow($this->power, $this->base() - floor($this->base())), $precision);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getValue() ? $this->power() . ' ' . $this->getUnit() : '0 bytes';
    }      
}
