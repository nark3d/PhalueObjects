<?php

namespace BestServedCold\PhalueObjects\Contract;

/**
 * Interface Floatable
 *
 * @package BestServedCold\PhalueObjects\Contract
 */
interface Floatable
{
    /**
     * @param  float $float
     * @return mixed
     */
    public static function fromFloat($float);

    /**
     * @return float
     */
    public function toFloat();
}
