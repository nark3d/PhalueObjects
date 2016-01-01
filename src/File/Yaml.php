<?php namespace BestServedCold\PhalueObjects\File;

use BestServedCold\PhalueObjects\File;
use Symfony\Component\Yaml\Yaml as SymfonyYaml;

/**
 * Class Yaml
 * @package BestServedCold\PhalueObjects\File
 */
final class Yaml extends File
{
    /**
     * Parse
     *
     * @return array
     */
    public function parse()
    {
        return SymfonyYaml::parse($this->getContents());
    }
}
