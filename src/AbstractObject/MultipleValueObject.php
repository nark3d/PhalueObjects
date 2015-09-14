<?php namespace PhalueObjects\AbstractObject;

use PhalueObjects\AbstractObject;

abstract class MultipleValueObject extends AbstractObject
{
    protected $arguments;

    public function __construct(array $arguments)
    {
        $this->arguments = $arguments;
        parent::__construct();
    }
}
