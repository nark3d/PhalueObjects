<?php namespace BestServedCold\PhalueObjects;


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