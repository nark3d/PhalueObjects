<?php namespace BestServedCold\PhalueObjects;

abstract class ValueObject implements ValueObjectInterface
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
        throw new \RuntimeException(
            "You cannot set a value of a Value Object, that's the whole point!"
        );
    }

    public function hash()
    {
        return spl_object_hash($this);
    }

    protected function cloneObject($object)
    {
        return clone($object);
    }
}
