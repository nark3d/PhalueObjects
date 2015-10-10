<?php namespace BestServedCold\PhalueObjects\Mathematical\Range;

use BestServedCold\PhalueObjects\Exception\InvalidRangeTypeException;
use BestServedCold\PhalueObjects\Mathematical\Range;

trait RangeTrait
{
    protected $maximum;
    protected $minimum;

    public function __construct($value)
    {
        if (
            $this->minimum &&
            $this->maximum &&
            !(new Range($this->maximum, $this->minimum))
                ->inRange(new self($value))) {
            throw new InvalidRangeTypeException(
                $value,
                [ 'Mathematical' ],
                $this->minimum,
                $this->maximum
            );
        }

        static::__construct($value);
    }
}
