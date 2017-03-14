<?php

namespace BestServedCold\PhalueObjects\Contract;

/**
 * Interface Arrayable
 *
 * @package BestServedCold\PhalueObjects\Contract
 */
interface Arrayable
{
    /**
     * @param  array  $array
     * @return static
     */
    public static function fromArray(array $array);

    /**
     * @return array
     */
    public function toArray();
}
