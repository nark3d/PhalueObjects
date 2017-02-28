<?php namespace

BestServedCold\PhalueObjects\Format;

use BestServedCold\PhalueObjects\Format;
use Symfony\Component\Yaml\Yaml as SymfonyYaml;

/**
 * Class Yaml
 * @package BestServedCold\PhalueObjects\File
 */
class Yaml extends Format
{
    /**
     * @return array
     */
    public function toArray()
    {
        return (array) SymfonyYaml::parse($this->getValue());
    }
}
