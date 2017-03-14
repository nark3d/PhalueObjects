<?php

namespace BestServedCold\PhalueObjects\Format\Json;

use BestServedCold\PhalueObjects\ArrayVO;
use BestServedCold\PhalueObjects\Format\Json;

/**
 * Class Notation
 *
 * @package BestServedCold\PhalueObjects\Format\Json
 */
class Notation extends Json
{
    /**
     * @return ArrayVO
     */
    public function toArrayVO()
    {
        return ArrayVO::fromArray(explode('.', $this->getValue()));
    }
}
