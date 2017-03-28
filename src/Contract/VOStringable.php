<?php

namespace BestServedCold\PhalueObjects\Contract;

use BestServedCold\PhalueObjects\VOString;

/**
 * Interface VOStringable
 *
 * @package BestServedCold\PhalueObjects\Contract
 */
interface VOStringable extends Stringable
{
    /**
     * @param  VOString $voString
     * @return static
     */
    public static function fromVOString(VOString $voString);

    /**
     * @return VOString
     */
    public function toVOString();
}
