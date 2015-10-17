<?php namespace BestServedCold\PhalueObjects\File;

use BestServedCold\PhalueObjects\File;
use Symfony\Component\Yaml\Yaml as SymfonyYaml;

final class Yaml extends File
{
    public function parse()
    {
        return SymfonyYaml::parse($this->getContents());
    }
}
