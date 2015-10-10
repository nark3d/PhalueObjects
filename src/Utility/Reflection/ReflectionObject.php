<?php namespace BestServedCold\PhalueObjects\Utility\Reflection;

class ReflectionObject extends AbstractReflection implements ReflectionInterface
{
    public function __construct($object)
    {
        $this->object = $object;
        $this->class = (string) get_class($object);
    }
}
