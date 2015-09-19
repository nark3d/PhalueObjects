<?php namespace BestServedCold\PhalueObjects\ValueObject;

use BestServedCold\PhalueObjects\ValueObject;

abstract class MultipleValue extends ValueObject
{
    protected $arguments;

    public function __construct(array $arguments)
    {
        $this->arguments = $arguments;
        parent::__construct();
    }

    public function getValues()
    {
        return $this->arguments;
    }

    public function equals(MultipleValue $object)
    {
        return $this->arguments === $object->getValues();
    }
}

