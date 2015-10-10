<?php

namespace BestServedCold\PhalueObjects;

use BestServedCold\PhalueObjects\ValueObject\SingleValue;

class Identity extends SingleValue
{
    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getValue();
    }
}
