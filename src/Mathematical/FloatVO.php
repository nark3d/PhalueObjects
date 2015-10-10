<?php

namespace BestServedCold\PhalueObjects\Mathematical;

use BestServedCold\PhalueObjects\Exception\InvalidTypeException;
use BestServedCold\PhalueObjects\Mathematical;

class FloatVO extends Mathematical
{
    protected $round = null;

    public function __construct($value, $round = null)
    {
        if (!filter_var($value, FILTER_VALIDATE_FLOAT)) {
            throw new InvalidTypeException($value, [ 'float' ]);
        }

        $value = $round ? $this->round($value, $round) : $value;

        $this->round = $round;

        parent::__construct($value);
    }

    public function round($value, $round)
    {
        return round($value, $round);
    }

    public function getValue()
    {
        return $this->round
            ? $this->round($this->value, $this->round)
            : $this->value;
    }
}
