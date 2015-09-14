<?php namespace PhalueObjects\String;

use PhalueObjects\Mathematical\Integer;

trait StringTrait
{
    public function integerToSpace(Integer $spaces)
    {
        return str_pad("", $spaces->getValue());
    }
}
