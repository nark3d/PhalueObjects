<?php namespace BestServedCold\PhalueObjects\Mathematical;

use BestServedCold\PhalueObjects\Mathematical;

class ZeroPaddedInteger extends Mathematical
{
    public function __construct($value, $leading = 2)
    {
        $this->value = str_pad($value, 2, '0', STR_PAD_LEFT);
    }
}
