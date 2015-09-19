<?php namespace BestServedCold\PhalueObjects;

interface ValueObjectInterface
{
    /**
     * @return string
     */
    public function __toString();

    public function __set($field, $value);
}
