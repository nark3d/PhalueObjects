<?php

namespace BestServedCold\PhalueObjects;

use BestServedCold\PhalueObjects\File\Local;
use BestServedCold\PhalueObjects\Format\String\Json;
use BestServedCold\PhalueObjects\Format\String\Xml;
use BestServedCold\PhalueObjects\Format\String\Yaml;

/**
 * Class FileTest
 *
 * @package BestServedCold\PhalueObjects
 */
class FileTest extends TestCase
{
    /**
     * @var Local $file
     */
    private $file;

    public function setUp()
    {
        $this->file = new Local('/some/path/someFile.txt');
        parent::setUp();
    }

    public function testToVOString()
    {
        self::assertInstanceOf(VOString::class, $this->file->toVOString());
    }

    public function testToXml()
    {
        self::assertInstanceOf(Xml::class, $this->file->toXml());
    }

    public function testToJson()
    {
        self::assertInstanceOf(Json::class, $this->file->toJson());
    }

    public function testToYaml()
    {
        self::assertInstanceOf(Yaml::class, $this->file->toYaml());
    }

}

