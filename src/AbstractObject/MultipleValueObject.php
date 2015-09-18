<?php namespace BestServedCold\PhalueObjects\AbstractObject;

use BestServedCold\PhalueObjects\AbstractObject;

abstract class MultipleValueObject extends AbstractObject
{
    protected $arguments;

    public function __construct(array $arguments)
    {
        $this->arguments = $arguments;
        parent::__construct();
    }

    public function equals(MultipleValueObject $object)
    {

    }
}
