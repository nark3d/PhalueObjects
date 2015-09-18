<?php namespace BestServedCold\PhalueObjects\Mathematical;

use BestServedCold\PhalueObjects\AbstractObject\MultipleValueObject;
use BestServedCold\PhalueObjects\ExtendedArray\ExtendedArrayTrait;
use BestServedCold\PhalueObjects\Mathematical;

class Range extends MultipleValueObject
{
    use ExtendedArrayTrait;

    protected $maximum;
    protected $minimum;

    public function __construct(Mathematical $maximum, Mathematical $minimum)
    {
        $this->maximum = $maximum;
        $this->minimum = $minimum;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->arrayToCommaString([$this->maximum, $this->minimum], new Integer(1));
    }
}