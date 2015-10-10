<?php

namespace BestServedCold\PhalueObjects;

class Identity extends ValueObject
{
    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getValue();
    }
}
