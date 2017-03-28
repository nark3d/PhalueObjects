<?php

namespace BestServedCold\PhalueObjects\Format;

use BestServedCold\PhalueObjects\Contract\VOArrayable;
use BestServedCold\PhalueObjects\VOString;
use Symfony\Component\Yaml\Yaml as SymfonyYaml;
use BestServedCold\PhalueObjects\VOArray\Mixin as VOArrayMixin;

/**
 * Class Yaml
 *
 * @package BestServedCold\PhalueObjects\File
 */
class Yaml extends VOString implements VOArrayable
{
    use VOArrayMixin;

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
