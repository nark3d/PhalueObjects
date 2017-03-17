<?php

namespace BestServedCold\PhalueObjects\VOArray;

use BestServedCold\PhalueObjects\VOArray;
use BestServedCold\PhalueObjects\Exception\InvalidTypeException;
use BestServedCold\PhalueObjects\Contract\ValueObject;

/**
 * Trait Metric
 */
trait Metric
{
    /**
     * @return int
     */
    public function count()
    {
        return count($this->getValue());
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return empty($this->value);
    }

    /**
     * @param  ValueObject $object
     * @return bool
     */
    public function equals(ValueObject $object)
    {
        if (! $object instanceof VOArray) {
            throw new InvalidTypeException($object, [ VOArray::class ]);
        }

        return parent::equals($object);
    }
}
