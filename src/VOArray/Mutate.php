<?php

namespace BestServedCold\PhalueObjects\VOArray;

/**
 * Class Mutate
 *
 * @package BestServedCold\PhalueObjects\VOArray
 */
trait Mutate
{

    /**
     * @return static
     */
    public function dropFirst()
    {
        return new static(array_slice($this->getValue(), 1, $this->count()));
    }

    /**
     * @return static
     */
    public function dropLast()
    {
        return new static(array_slice($this->getValue(), 0, -1));
    }
}
