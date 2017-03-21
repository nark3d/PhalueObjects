<?php

namespace BestServedCold\PhalueObjects;

use BestServedCold\Reflection\ReflectionClass;
use BestServedCold\Reflection\ReflectionObject;
use Mockery;

/**
 * Class TestCase
 *
 * @package BestServedCold\PhalueObjects
 */
class TestCase extends \PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        Mockery::close();
    }

    public function mock($class)
    {
        return Mockery::mock($class);
    }

    public function reflect($object)
    {
        return is_string($object) ? new ReflectionClass($object) : new ReflectionObject($object);
    }
}
