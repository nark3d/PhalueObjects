<?php namespace PhalueObjects\ExtendedArray;

use PhalueObjects\Number\Integer;
use PhalueObjects\String\StringTrait;

trait ExtendedArrayTrait
{
    use StringTrait;

    public function arrayToCommaString(array $array, Integer $spaces)
    {
        return implode(",{$this->integerToSpace($spaces)}", $array);
    }
}
