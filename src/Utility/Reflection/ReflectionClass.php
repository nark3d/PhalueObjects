<?php namespace BestServedCold\PhalueObjects\Utility\Reflection;

class ReflectionClass extends AbstractReflection implements ReflectionInterface
{
    public function __construct($class)
    {
        $this->class = (string) $class;
    }
}
