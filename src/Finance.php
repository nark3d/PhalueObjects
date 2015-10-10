<?php

namespace BestServedCold\PhalueObjects;

use BestServedCold\PhalueObjects\Mathematical\FloatVO;

class Finance extends FloatVO
{
    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getValue();
    }
}
