<?php

namespace BestServedCold\PhalueObjects\Contract;

/**
 * Interface Diffable
 *
 * @package BestServedCold\PhalueObjects\Contract
 */
interface Diffable
{
    /**
     * @param  ValueObject $valueObject
     * @return static
     */
    public function diff(ValueObject $valueObject);
}
