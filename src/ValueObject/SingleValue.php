<?php

namespace BestServedCold\PhalueObjects\ValueObject;

use BestServedCold\PhalueObjects\ValueObject;

abstract class SingleValue extends ValueObject
{
    protected $value;

    /**
     * Class Constructor.
     *
     * @param $value
     */
    public function __construct($value)
    {
        $this->value = $value;
        parent::__construct();
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    public function __toString()
    {
        return (string) $this->value;
    }

    public function equals(SingleValue $object)
    {
        return $this->value === $object->value;
    }
}
