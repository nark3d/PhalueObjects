<?php namespace PhalueObjects;

use BestServedCold\PhalueObjects\AbstractObject\SingleValueObject;

class String extends SingleValueObject
{

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->value;
    }
}
