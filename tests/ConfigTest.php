<?php namespace BestServedCold\PhalueObjects;

class ConfigTest extends TestCase
{
    public function testGet()
    {
        var_dump(Config::get('language.locale'));
    }
}