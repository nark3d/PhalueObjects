<?php namespace BestServedCold\PhalueObjects;


class ConfigurationTest extends TestCase
{
    public function testGet()
    {
//        $config = $this->reflect(new );
        var_dump(Configuration::get('language.locale'));
    }
}