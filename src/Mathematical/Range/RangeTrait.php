<?php namespace BestServedCold\PhalueObjects\Mathematical\Range;

use BestServedCold\PhalueObjects\Exception\InvalidRangeTypeException;
use BestServedCold\PhalueObjects\Mathematical;
use BestServedCold\PhalueObjects\Mathematical\Range;

trait RangeTrait
{
    abstract public function getMaximum();
    abstract public function getMinimum();

    public function __construct($value)
    {
        if (method_exists(get_parent_class($this), '__construct')) {
            parent::__construct($value);
        }

        if (
            !(
                new Range(
                    $this->getMaximum(),
                    $this->getMinimum())
                )->inRange(new Mathematical($value))
        ) {

            throw new InvalidRangeTypeException(
                $value,
                [ 'Mathematical' ],
                $this->getMinimum(),
                $this->getMaximum()
            );
        }

    }
}
