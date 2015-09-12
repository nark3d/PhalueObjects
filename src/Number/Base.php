<?php namespace PhalueObjects\Number;

use PhalueObjects\AbstractObject;

class Base extends AbstractObject
{
    protected $value;

    public function getValue()
    {
        return $this->value;
    }

}