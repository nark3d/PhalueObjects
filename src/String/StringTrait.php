<?php namespace PhalueObjects\String;

use PhalueObjects\Number\Integer;

trait StringTrait
{
    public function integerToSpace(Integer $spaces)
    {
        return str_pad("", $spaces->getValue());
    }
}