<?php namespace BestServedCold\PhalueObjects\String;

use BestServedCold\PhalueObjects\Mathematical\Integer;

trait StringTrait
{
    public function integerToSpace(Integer $spaces)
    {
        return str_pad("", $spaces->getValue());
    }
}
