<?php

namespace BestServedCold\PhalueObjects\Contract;

/**
 * Interface Stringable
 *
 * @package BestServedCold\PhalueObjects\Contract
 */
interface Stringable
{
    /**
     * @param  string $string
     * @return static
     */
    public static function fromString($string);

    /**
     * @return string
     */
    public function toString();
}
