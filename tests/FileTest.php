<?php

namespace BestServedCold\PhalueObjects;

use BestServedCold\PhalueObjects\Format\Json;
use BestServedCold\PhalueObjects\Format\Xml;
use BestServedCold\PhalueObjects\Format\Yaml;

/**
 * Class FileTest
 *
 * @package BestServedCold\PhalueObjects
 */
class FileTest extends TestCase
{
    /**
     * @var File $file
     */
    private $file;

    public function setUp()
    {
        $this->file = new File(__FILE__);
        parent::setUp();
    }

    public function testExists()
    {
        self::assertTrue($this->file->exists());
    }

    public function testGetContents()
    {
        self::assertTrue(is_string($this->file->getContents()));
    }

    public function testGetExtension()
    {
        self::assertEquals('php', $this->file->getExtension());
    }

    public function testGetDirectoryName()
    {
        self::assertTrue(is_string($this->file->getDirectoryName()));
    }

    public function testGetFileName()
    {
        self::assertEquals('FileTest', $this->file->getFileName());
    }

    public function testToString()
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

