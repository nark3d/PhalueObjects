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

        self::assertEquals('susan', Configuration::get('bob'));
        self::assertEquals('sally', Configuration::get('mary.harry'));
        self::assertNotEquals('billy', Configuration::get('bob'));
    }
}
