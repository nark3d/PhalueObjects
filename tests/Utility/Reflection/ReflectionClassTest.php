<?php

namespace BestServedCold\PhalueObjects\Utility;

use BestServedCold\PhalueObjects\TestCase;
use BestServedCold\PhalueObjects\Utility\Reflection\ReflectionClass;

class ReflectionClassTest extends TestCase
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
        $this->assertSame(self::$publicStaticProperty,
            (new ReflectionClass(__CLASS__))->publicStaticProperty);
        $this->assertSame(self::$protectedStaticProperty,
            (new ReflectionClass(__CLASS__))->protectedStaticProperty);
        $this->assertSame(self::$privateStaticProperty,
            (new ReflectionClass(__CLASS__))->privateStaticProperty);
    }

    public function testSetProperty()
    {
        $reflection = new ReflectionClass(__CLASS__);
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
        $this->assertSame(
            5,
            (new ReflectionClass(__CLASS__))->publicStaticMethod(1)
        );
        $this->assertSame(
            6,
            (new ReflectionClass(__CLASS__))->protectedStaticMethod(1)
        );
        $this->assertSame(
            7,
            (new ReflectionClass(__CLASS__))->privateStaticMethod(1)
        );
    }
}
