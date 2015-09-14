<?php namespace PhalueObjects\String;

use PhalueObjects\Mathmatic\Integer;

trait StringTrait
{
    public function integerToSpace(Integer $spaces)
    {
        return str_pad("", $spaces->getValue());
    }
}
