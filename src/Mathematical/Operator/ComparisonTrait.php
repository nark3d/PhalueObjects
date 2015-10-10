<?php

namespace BestServedCold\PhalueObjects\Mathematical\Operator;

use BestServedCold\PhalueObjects\ValueObjectInterface;

trait ComparisonTrait
{
    public abstract function getValue();

    public function isGreaterThan(ValueObjectInterface $object)
    {
        return $this->getValue() > $object->getValue();
    }

    public function isLessThan(ValueObjectInterface $object)
    {
        return $this->getValue() < $object->getValue();
    }

    public function isGreaterThanOrEqualTo(ValueObjectInterface $object)
    {
        return $this->getValue() >= $object->getValue();
    }

    public function isLessThanOrEqualTo(ValueObjectInterface $object)
    {
        return $this->getValue() <= $object->getValue();
    }

    public function spaceship(ValueObjectInterface $object)
    {
        return ($this->getValue() < $object->getValue())
                ? -1
                : (
                ($this->getValue() > $object->getValue())
                    ? 1
                    : 0
                );
    }
}
