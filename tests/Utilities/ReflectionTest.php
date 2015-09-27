<?php namespace BestServedCold\PhalueObjects\Utility;

use BestServedCold\PhalueObjects\TestCase;

class ReflectionTest extends TestCase
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
        $this->assertSame($this->publicProperty,
            $this->reflect($this)->publicProperty);
        $this->assertSame($this->protectedProperty,
            $this->reflect($this)->protectedProperty);
        $this->assertSame($this->privateProperty,
            $this->reflect($this)->privateProperty);
        $this->assertSame(self::$publicStaticProperty,
            $this->reflect(__CLASS__)->publicStaticProperty);
        $this->assertSame(self::$protectedStaticProperty,
            $this->reflect(__CLASS__)->protectedStaticProperty);
        $this->assertSame(self::$privateStaticProperty,
            $this->reflect(__CLASS__)->privateStaticProperty);
    }

    public function testSetProperty()
    {
        $this->reflect($this)->publicStaticProperty = 5;
        $this->assertSame(5, self::$publicStaticProperty);
        $this->reflect($this)->protectedStaticProperty = 5;
        $this->assertSame(5, self::$protectedStaticProperty);
        $this->reflect($this)->privateStaticProperty = 5;
        $this->assertSame(5, self::$privateStaticProperty);
        $this->reflect(__CLASS__)->publicStaticProperty = 5;
        $this->assertSame(5, self::$publicStaticProperty);
        $this->reflect(__CLASS__)->protectedStaticProperty = 5;
        $this->assertSame(5, self::$protectedStaticProperty);
        $this->reflect(__CLASS__)->privateStaticProperty = 5;
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
        $this->assertSame(2, $this->reflect($this)->publicMethod(1));
        $this->assertSame(3, $this->reflect($this)->protectedMethod(1));
        $this->assertSame(4, $this->reflect($this)->privateMethod(1));
        $this->assertSame(5, $this->reflect(__CLASS__)->publicStaticMethod(1));
        $this->assertSame(6, $this->reflect(__CLASS__)->protectedStaticMethod(1));
        $this->assertSame(7, $this->reflect(__CLASS__)->privateStaticMethod(1));
    }
}
