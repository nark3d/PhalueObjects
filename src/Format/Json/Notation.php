<?php

namespace BestServedCold\PhalueObjects\Format\Json;

use BestServedCold\PhalueObjects\VOArray;
use BestServedCold\PhalueObjects\Format\Json;

/**
 * Class Notation
 *
 * @package BestServedCold\PhalueObjects\Format\Json
 */
class Notation extends Json
{
    /**
     * @return VOArray
     */
    public function toVOArray()
    {
        return VOArray::fromArray(explode('.', $this->getValue()));
    }
}
