<?php

namespace BestServedCold\PhalueObjects\Request;

use BestServedCold\PhalueObjects\TestCase;

/**
 * Class FileTest
 *
 * @package BestServedCold\PhalueObjects\Request
 */
class FileTest extends TestCase
{
    public function testConstructor()
    {
        self::assertInstanceOf(\SplFileObject::class, (new File(new \SplFileObject(__FILE__)))->getValue());
    }

    public function testFromFileObject()
    {
        self::assertInstanceOf(
            \SplFileObject::class,
            File::fromFileObject(new \SplFileObject(__FILE__))->getValue()
        );
    }

    public function testFromPath()
    {
        self::assertInstanceOf(
            \SplFileObject::class,
            File::fromPath(__FILE__)->getValue()
        );
    }

    public function testGetContents()
    {
        self::assertTrue(is_string(File::fromPath(__FILE__)->getContents()));
    }

    public function testGetInfo()
    {
        self::assertInstanceOf(\SplFileObject::class, File::fromPath(__FILE__)->getInfo());
    }
}
