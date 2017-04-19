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
     * @param  VOFloat $voFloat
     * @return mixed
     */
    public static function fromVOFloat(VOFloat $voFloat);

    /**
     * @return VOFloat
     */
    public function toVOFloat();
}
