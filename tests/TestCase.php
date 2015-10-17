<?php

namespace BestServedCold\PhalueObjects;

use BestServedCold\PhalueObjects\Utility\Reflection\ReflectionClass;
use Mockery;
use BestServedCold\PhalueObjects\Utility\Reflection\ReflectionObject;

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
        if (is_string($object)) {
            return new ReflectionClass($object);
        }
        return new ReflectionObject($object);
    }
}
