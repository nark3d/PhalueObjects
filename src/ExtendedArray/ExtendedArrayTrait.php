<?php namespace BestServedCold\PhalueObjects\ExtendedArray;

use BestServedCold\PhalueObjects\Mathematical\Integer;
use BestServedCold\PhalueObjects\String\StringTrait;

trait ExtendedArrayTrait
{
    use StringTrait;

    public function arrayToCommaString(array $array, Integer $spaces)
    {
        return implode(",{$this->integerToSpace($spaces)}", $array);
    }
}
