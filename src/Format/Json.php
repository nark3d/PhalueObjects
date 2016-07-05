<?php

namespace BestServedCold\PhalueObjects\Format;

use BestServedCold\PhalueObjects\Format;

final class Json extends Format
{
    /**
     * @return mixed
     */
    public function parse()
    {
        return json_decode($this->getValue());
    }
}
