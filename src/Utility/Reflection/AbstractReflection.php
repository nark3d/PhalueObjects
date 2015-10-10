<?php

namespace BestServedCold\PhalueObjects\Utility\Reflection;

/**
 * Class AbstractReflection
 *
 * @package   BestServedCold\PhalueObjects\Utility\Reflection
 * @author    Adam Lewis <adam.lewis@bestservedcold.com>
 * @copyright Copyright (c) 2015 Best Served Cold Media Limited
 * @license	  http://http://opensource.org/licenses/GPL-3.0 GPL License
 * @link	  http://bestservedcold.com
 * @since	  0.0.1-alpha
 * @version   0.0.2-alpha
 */
abstract class AbstractReflection
{
    /**
     * @var string
     */
    protected $class;

    /**
     * @var object
     */
    protected $object;

    /**
     * __get.
     *
     * Overloading method to get any $key property from $this->class or if not
     * static, from $this->object.
     *
     * @param  $key
     * @return \ReflectionProperty
     */
    public function __get($key)
    {
        $property = new \ReflectionProperty($this->class, $key);
        $property->setAccessible(true);

        return $property->isStatic()
            ? $property->getValue()
            : $property->getValue($this->object);
    }

    /**
     * __set.
     *
     * Overloading method to set any $key property to $this->class or if not static,
     * to $this->object.
     *
     * @param  $key
     * @param  $value
     * @return $this
     */
    public function __set($key, $value)
    {
        $property = new \ReflectionProperty($this->class, $key);
        $property->setAccessible(true);

        $property->isStatic()
            ? $property->setValue($value)
            : $property->setValue($this->object, $value);

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
        $method = new \ReflectionMethod($this->class, $name);
        $method->setAccessible(true);

        return $method->isStatic()
            ? $method->invokeArgs(null, $args)
            : $method->invokeArgs($this->object, $args);
    }
}
