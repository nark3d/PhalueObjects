<?php

namespace BestServedCold\PhalueObjects\Utility;

use BestServedCold\PhalueObjects\TestCase;

class ConfigurationTest extends TestCase
{
    public function testGet()
    {
        $configuration = $this->reflect(Configuration::getInstance());
        $configuration->configuration = [
            'bob' => 'susan',
            'mary' => [
                'harry' => 'sally'
            ]
        ];

        $this->assertEquals('susan', Configuration::get('bob'));
        $this->assertEquals('sally', Configuration::get('mary.harry'));
        $this->assertNotEquals('billy', Configuration::get('bob'));
    }
}
