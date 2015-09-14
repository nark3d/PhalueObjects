<?php namespace PhalueObjects;

interface ObjectInterface
{
    /**
     * @return string
     */
    public function __toString();

    public function __set($field, $value);
}
