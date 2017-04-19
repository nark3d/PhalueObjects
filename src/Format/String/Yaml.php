<?php

namespace BestServedCold\PhalueObjects\Format\String;

use BestServedCold\PhalueObjects\Contract\VOArrayable;
use Symfony\Component\Yaml\Yaml as SymfonyYaml;

/**
 * Class Yaml
 *
 * @package BestServedCold\PhalueObjects\File
 */
class Yaml extends AbstractString implements VOArrayable
{
    /**
     * @return array
     */
    public function toArray()
    {
        return (array) SymfonyYaml::parse($this->getValue());
    }

    /**
     * @param  array  $array
     * @return static
     */
    public static function fromArray(array $array)
    {
        return new static(SymfonyYaml::dump($array));
    }
}
