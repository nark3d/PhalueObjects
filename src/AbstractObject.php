<?php namespace BestServedCold\PhalueObjects;

abstract class AbstractObject implements ObjectInterface
{
    protected $reflection;

    public function __construct()
    {
        $this->reflection = new \ReflectionClass($this);
    }

    public function getShortName()
    {
        return $this->reflection->getShortName();
    }

    public function __set($field, $value)
    {
        throw new \RuntimeException("You cannot set a value of a Value Object, that's the whole point!");
    }

    public function hash()
    {
        return spl_object_hash($this);
    }
}
