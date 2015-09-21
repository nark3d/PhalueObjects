<?php namespace BestServedCold\PhalueObjects\Mathematical;

use BestServedCold\PhalueObjects\ExtendedArray\ExtendedArrayTrait;
use BestServedCold\PhalueObjects\Mathematical;
use BestServedCold\PhalueObjects\ValueObject\MultipleValue;

class Range extends MultipleValue
{
    use ExtendedArrayTrait;

    protected $minimum;
    protected $maximum;

    /**
     * @param boolean $maximum
     * @param boolean $minimum
     */
    public function __construct($maximum, $minimum)
    {
        $this->maximum = $maximum;
        $this->minimum = $minimum;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->arrayToCommaString(
            [ $this->maximum, $this->minimum ],
            new Integer(1)
        );
    }

    public function inRange(Mathematical $mathematical)
    {
        return (
            $this->minimum <= $mathematical->getValue()
        ) && (
            $this->minimum <= $mathematical->getValue()
        );
    }
}
