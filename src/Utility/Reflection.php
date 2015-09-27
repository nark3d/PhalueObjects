<?php

namespace BestServedCold\PhalueObjects\Utility;

class Reflection
{
    /**
     * @var mixed
     */
    private $class;
    private $object;

    /**
     * Class Constructor.
     *
     * If the $classOrObject parameter is an object, then set $this->class to the
     * name of the object and $this->object to be the $classOrObject parameter.
     * If the $classOrObject parameter is NOT an object, then set $this->class to be
     * the string of $classOrObject and $this->object to be false.
     *
     * @param mixed $classOrObject
     */
    public function __construct($classOrObject, $args = [])
    {
        list($this->class, $this->object) = is_object($classOrObject)
            ? [get_class($classOrObject), $classOrObject]
            : [(string) $classOrObject, false];
    }

    /**
     * Set Accessible.
     *
     * If the $reflector->isPublic() method returns false then run the
     * $reflector->setAccessible(true) method to allow access in the reflection
     * object.
     *
     * @param \ReflectionProperty|\ReflectionMethod $reflector
     *
     * @return \ReflectionProperty|\ReflectionMethod
     */
    private function setAccessible($reflector)
    {
        $reflector->isPublic() ?: $reflector->setAccessible(true);

        return $reflector;
    }

    /**
     * __get.
     *
     * Overloading method to get any $key property from $this->class or if not
     * static, from $this->object.
     *
     * @param  $key
     *
     * @return \ReflectionProperty
     */
    public function __get($key)
    {
        $property = $this->setAccessible(new \ReflectionProperty($this->class, $key));

        return $property->isStatic() ? $property->getValue() : $property->getValue($this->object);
    }

    /**
     * __set.
     *
     * Overloading method to set any $key property to $this->class or if not static,
     * to $this->object.
     *
     * @param  $key
     * @param  $value
     *
     * @return $this
     */
    public function __set($key, $value)
    {
        $property = $this->setAccessible(new \ReflectionProperty($this->class, $key));
        $property->isStatic() ? $property->setValue($value) : $property->setValue($this->object, $value);

        return $this;
    }

    /**
     * __call.
     *
     * Overloading method to call the $name method from $this->class and if not
     * static, using $this->object.
     *
     * @param  $name
     * @param  $args
     *
     * @return \ReflectionMethod
     */
    public function __call($name, $args)
    {
        $method = $this->setAccessible(new \ReflectionMethod($this->class, $name));

        return $method->isStatic()
            ? $method->invokeArgs(null, $args)
            : $method->invokeArgs($this->object, $args);
    }
}
