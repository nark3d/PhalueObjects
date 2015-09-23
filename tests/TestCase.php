<?php namespace BestServedCold\PhalueObjects;

use Mockery;
use BestServedCold\PhalueObjects\Utility\Reflection;

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

    public function reflect($classOrObject, array $args = [])
    {
        return new Reflection($classOrObject, $args);
    }
}