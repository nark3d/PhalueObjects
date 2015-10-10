<?php

namespace BestServedCold\PhalueObjects\Mathematical;

use BestServedCold\PhalueObjects\Mathematical;

class ZeroPaddedInteger extends Mathematical
{
    public function __construct($value, $leading = 2)
    {
        parent::__construct(
            str_pad(
                $value,
                strlen((string) $value) + $leading,
                "0",
                STR_PAD_LEFT)
        );
    }
}
