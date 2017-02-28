<?php

namespace BestServedCold\PhalueObjects\Format;

use BestServedCold\PhalueObjects\Format;

class Json extends Format
{
    /**
     * @return array
     */
    public function toArray()
    {
        return (array) json_decode($this->getValue());
    }
}
