<?php namespace PhalueObjects\ExtendedArray;

use PhalueObjects\Mathmatic\Integer;
use PhalueObjects\String\StringTrait;

trait ExtendedArrayTrait
{
    use StringTrait;

    public function arrayToCommaString(array $array, Integer $spaces)
    {
        return implode(",{$this->integerToSpace($spaces)}", $array);
    }
}
