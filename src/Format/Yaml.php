<?php namespace

BestServedCold\PhalueObjects\Format;

use BestServedCold\PhalueObjects\Format;
use Symfony\Component\Yaml\Yaml as SymfonyYaml;

/**
 * Class Yaml
 * @package BestServedCold\PhalueObjects\File
 */
final class Yaml extends Format
{
    /**
     * Parse
     *
     * @return array
     */
    public function parse()
    {
        return SymfonyYaml::parse($this->getValue());
    }
}
