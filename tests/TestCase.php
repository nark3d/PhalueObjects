<?php

namespace BestServedCold\PhalueObjects;

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
        return new ReflectionObject($object);
    }
}
