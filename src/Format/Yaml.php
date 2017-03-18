<?php namespace

BestServedCold\PhalueObjects\Format;

use BestServedCold\PhalueObjects\Contract\Arrayable;
use BestServedCold\PhalueObjects\Contract\VOArrayable;
use BestServedCold\PhalueObjects\Format;
use BestServedCold\PhalueObjects\VOArray;
use Symfony\Component\Yaml\Yaml as SymfonyYaml;

/**
 * Class Yaml
 *
 * @package BestServedCold\PhalueObjects\File
 */
class Yaml extends Format implements Arrayable, VOArrayable
{
    /**
     * @return array
     */
    public function toArray()
    {
        return (array) SymfonyYaml::parse($this->getValue());
    }

    /**
     * @return VOArray
     */
    public function toVOArray()
    {
        return VOArray::fromArray(self::toArray());
    }

    /**
     * @param  array  $array
     * @return static
     */
    public static function fromArray(array $array)
    {
        return new static(SymfonyYaml::dump($array));
    }

    /**
     * @param  VOArray $voArray
     * @return Yaml
     */
    public static function fromVOArray(VOArray $voArray)
    {
        return self::fromArray($voArray->getValue());
    }
}
