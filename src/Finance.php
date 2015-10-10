<?php

namespace BestServedCold\PhalueObjects;

class Finance extends ValueObject
{
    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getValue();
    }
}
