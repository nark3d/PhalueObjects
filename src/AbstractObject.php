<?php namespace PhalueObjects;

abstract class AbstractObject implements ObjectInterface
{
    protected $reflection;
    protected $value;

    public function __construct($value)
    {
        $this->value = $value;
        $this->reflection = new \ReflectionClass($this);
    }

    public function __toString()
    {
        return $this->reflection->getShortName();
    }

    public function __set($field, $value)
    {
        throw new \RuntimeException("You cannot set a value of a Value Object, that's the whole point!");
    }

    public function __invoke($value)
    {
        return new static($value);
    }

    public function native()
    {
        return $this->value;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function hash()
    {
        return spl_object_hash($this);
    }
}
