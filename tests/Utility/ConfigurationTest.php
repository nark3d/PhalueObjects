<?php

namespace BestServedCold\PhalueObjects\Utility;

use BestServedCold\PhalueObjects\TestCase;

class ConfigurationTest extends TestCase
{
    public function testGetFileString()
    {
        $reflection = new \ReflectionClass(Configuration::getInstance());
        $configuration = $this->reflect(Configuration::getInstance());
        $configuration->path = '/bob/';
        $configuration->file = 'bottom.yml';
        $this->assertEquals(
            dirname($reflection->getFilename()) . '/bob/bottom.yml',
            Configuration::getFileString()
        );

        Configuration::destroy();
    }

    public function testGet()
    {
        //        $configuration = $this->mock(
//            'BestServedCold\PhalueObjects\Configuration'
//        );

//        $config = $this->reflect(new );
//        var_dump(Configuration::get('language.locale'));
        $this->assertTrue(true);
    }
}
