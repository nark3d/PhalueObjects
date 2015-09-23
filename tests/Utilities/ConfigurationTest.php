<?php namespace BestServedCold\PhalueObjects\Utilities;

use BestServedCold\PhalueObjects\TestCase;

class ConfigurationTest extends TestCase
{
    public function testGet()
    {
//        $configuration = $this->mock(
//            'BestServedCold\PhalueObjects\Configuration'
//        );

//        $config = $this->reflect(new );
        var_dump(Configuration::get('language.locale'));
    }
}