<?php

namespace BestServedCold\PhalueObjects\Utility;

use BestServedCold\PhalueObjects\TestCase;
use BestServedCold\PhalueObjects\Utility\Reflection\ReflectionObject;

class ReflectionObjectTest extends TestCase
{
    public $reflection;
    public $reflectionStatic;
    public $publicProperty;
    public static $publicStaticProperty;
    protected $protectedProperty;
    protected static $protectedStaticProperty;
    private $privateProperty;
    private static $privateStaticProperty;

    public function setUp()
    {
        parent::setUp();
        $this->publicProperty = 1;
        self::$publicStaticProperty = 2;
        $this->protectedProperty = 3;
        self::$protectedStaticProperty = 4;
        $this->privateProperty = 5;
        self::$privateStaticProperty = 6;
    }

    public function testGetProperty()
    {
        $this->assertSame(
            $this->publicProperty,
            (new ReflectionObject($this))->publicProperty
        );
        $this->assertSame(
            $this->protectedProperty,
            (new ReflectionObject($this))->protectedProperty
        );
        $this->assertSame(
            $this->privateProperty,
            (new ReflectionObject($this))->privateProperty
        );
    }

    public function testSetProperty()
    {
        $reflection = new ReflectionObject($this);
        $reflection->publicStaticProperty = 5;
        $this->assertSame(5, self::$publicStaticProperty);
        $reflection->protectedStaticProperty = 5;
        $this->assertSame(5, self::$protectedStaticProperty);
        $reflection->privateStaticProperty = 5;
        $this->assertSame(5, self::$privateStaticProperty);
    }

    public function publicMethod($number)
    {
        return $number + 1;
    }

    protected function protectedMethod($number)
    {
        return $number + 2;
    }

    private function privateMethod($number)
    {
        return $number + 3;
    }

    public static function publicStaticMethod($number)
    {
        return $number + 4;
    }

    protected static function protectedStaticMethod($number)
    {
        return $number + 5;
    }

    private static function privateStaticMethod($number)
    {
        return $number + 6;
    }

    public function testCallMethod()
    {
        $this->assertSame(2, (new ReflectionObject($this))->publicMethod(1));
        $this->assertSame(3, (new ReflectionObject($this))->protectedMethod(1));
        $this->assertSame(4, (new ReflectionObject($this))->privateMethod(1));
    }
}
