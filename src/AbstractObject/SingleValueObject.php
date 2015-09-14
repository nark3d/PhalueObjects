<?php namespace PhalueObjects\AbstractObject;

use PhalueObjects\AbstractObject;

abstract class SingleValueObject extends AbstractObject
{
    protected $value;

    /**
     * Class Constructor
     *
     * @param $value
     */
    public function __construct($value)
    {
        $this->value = $value;
        parent::__construct();
    }

    /**
     * @return integer
     */
    public function getValue()
    {
        return $this->value;
    }

    public function __invoke($value)
    {
        return new static($value);
    }
}