<?php

namespace BestServedCold\PhalueObjects\Format\String;

use BestServedCold\PhalueObjects\TestCase;
use BestServedCold\PhalueObjects\VOArray;
use BestServedCold\PhalueObjects\VOString;

/**
 * Class JsonTest
 *
 * @package BestServedCold\PhalueObjects\Format
 */
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

    public function testToString()
    {
        self::assertEquals(
            '{"some":"test","data":{"to":"test","bob":"susan"}}',
            Json::fromArray($this->array)->toString()
        );
    }

    public function testFromString()
    {
        self::assertEquals(
            '{"some":"test","data":{"to":"test","bob":"susan"}}',
            Json::fromString('{"some":"test","data":{"to":"test","bob":"susan"}}')->toString()
        );
    }

    public function testToVOString()
    {
        self::assertInstanceOf(
            VOString::class,
            Json::fromString('{"some":"test","data":{"to":"test","bob":"susan"}}')->toVOString()
        );
    }
}
