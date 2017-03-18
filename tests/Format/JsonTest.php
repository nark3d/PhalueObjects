<?php

namespace BestServedCold\PhalueObjects\Format;

use BestServedCold\PhalueObjects\TestCase;
use BestServedCold\PhalueObjects\VOArray;

class JsonTest extends TestCase
{
    private $array = [
        'some' => 'test',
        'data' => [
            'to' => 'test',
            'bob' => 'susan'
        ]
    ];

    public function testToArray()
    {
        self::assertEquals(
            $this->array,
            Json::fromString('{"some":"test","data":{"to":"test","bob":"susan"}}')->toArray()
        );
    }

    public function testToVOArray()
    {
        $voArray = Json::fromString('{"some":"test","data":{"to":"test","bob":"susan"}}')->toVOArray();
        self::assertInstanceOf(
            VOArray::class,
            $voArray
        );
        self::assertEquals($this->array, $voArray->getValue());
    }
    public function testFromArray()
    {
        self::assertEquals(
            '{"some":"test","data":{"to":"test","bob":"susan"}}',
            Json::fromArray($this->array)->getValue()
        );
    }

    public function testFromVOArray()
    {
        self::assertEquals(
            '{"some":"test","data":{"to":"test","bob":"susan"}}',
            Json::fromVOArray(VOArray::fromArray($this->array))
        );
    }
}
