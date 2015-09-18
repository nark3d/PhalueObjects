<?php namespace BestServedCold\PhalueObjects;

class AbstractObjectTest extends TestCase
{
    public $abstractObject;

    public function setUp()
    {
        $this->abstractObject = $this->reflect(
            $this->getMockForAbstractClass(
                'BestServedCold\PhalueObjects\AbstractObject'
            )
        );
    }

    public function testConstructor()
    {

//        $this->abstractObject->
//        var_dump($this->abstractObject);
//        $this->assertInstanceOf(\)

    }
}