<?php namespace PhalueObjects;

interface ObjectInterface
{
    public function __toString();

    public function __set($field, $value);
}