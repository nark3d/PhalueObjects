<?php

namespace BestServedCold\PhalueObjects\Format\String;

use BestServedCold\PhalueObjects\TestCase;
use BestServedCold\PhalueObjects\VOArray;

class YamlTest extends TestCase
{
    private $yaml = "- test:\n" .
        "    name: something \n" .
        "    1980: RAD\n" .
        "- somethingElse:\n" .
        "    bob: mary\n";

    private $array = [
        ['test' => ['name' => 'something', '1980' => 'RAD']],
        ['somethingElse' => ['bob' => 'mary']]
    ];

    public function testToArray()
    {
        self::assertEquals($this->array, Yaml::fromString($this->yaml)->toArray());
    }

    public function testToVoArray()
    {
        self::assertInstanceOf(VOArray::class, Yaml::fromString($this->yaml)->toVOArray());
    }

    public function testFromArray()
    {
        self::assertEquals(
            "-\n    test: { name: something, 1980: RAD }\n-\n    somethingElse: { bob: mary }\n",
            Yaml::fromArray($this->array)->getValue()
        );
    }

    public function testFromVOArray()
    {
        self::assertEquals(
            "-\n    test: { name: something, 1980: RAD }\n-\n    somethingElse: { bob: mary }\n",
            Yaml::fromVOArray(VOArray::fromArray($this->array))->getValue()
        );
    }
}
