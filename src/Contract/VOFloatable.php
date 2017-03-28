<?php

namespace BestServedCold\PhalueObjects\Contract;

use BestServedCold\PhalueObjects\VOFloat;

/**
 * Interface VOFloatable
 *
 * @package BestServedCold\PhalueObjects\Contract
 */
interface VOFloatable extends Floatable
{
    /**
     * @return static
     */
    public static function fromVOFloat(VOFloat $voFloat);

    /**
     * @return VOFloat
     */
    public function toVOFloat();
}
