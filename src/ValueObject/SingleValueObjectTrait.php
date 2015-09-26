<?php namespace BestServedCold\PhalueObjects\ValueObject;

trait SingleValueObjectTrait
{
    protected $value;

    public function getValue()
    {
        return $this->value;
    }
}
