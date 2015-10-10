<?php

namespace BestServedCold\PhalueObjects;

use BestServedCold\PhalueObjects\ValueObject\SingleValue;

class Geography extends SingleValue
{
    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getValue();
    }
}
