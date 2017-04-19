<?php

namespace BestServedCold\PhalueObjects\Format\String;

use BestServedCold\PhalueObjects\VOString;
use BestServedCold\PhalueObjects\VOArray\Mixin;

/**
 * Class AbstractString
 *
 * @package BestServedCold\PhalueObjects\Format\String
 */
abstract class AbstractString extends VOString
{
    use Mixin;

    /**
     * @return array
     */
    abstract public function toArray();

    /**
     * @param  array      $array
     * @throws \Exception
     */
    public static function fromArray(array $array)
    {
        throw new \Exception(
            'Method [fromArray] with must be implemented in child class'.
            'and type ['.gettype($array).'] must be array.'
        );
    }

    /**
     * @param  Yaml $yaml
     * @return static
     */
    public static function fromVOYaml(Yaml $yaml)
    {
        return static::fromArray($yaml->toArray());
    }

    /**
     * @param  $yaml
     * @return static
     */
    public static function fromYaml($yaml)
    {
        return static::fromVOYaml(Yaml::fromString($yaml));
    }

    /**
     * @return Yaml
     */
    public function toVOYaml()
    {
        return Yaml::fromArray($this->toArray());
    }

    /**
     * @return string
     */
    public function toYaml()
    {
        return self::toVOYaml()->getValue();
    }

    /**
     * @param  Xml    $xml
     * @return static
     */
    public function fromVOXml(Xml $xml)
    {
        return static::fromArray($xml->toArray());
    }

    /**
     * @param  $xml
     * @return static
     */
    public function fromXml($xml)
    {
        return self::fromVOXml(Xml::fromString($xml));
    }

    /**
     * @return Xml
     */
    public function toVOXml()
    {
        return Xml::fromArray($this->toArray());
    }

    /**
     * @return string
     */
    public function toXml()
    {
        return $this->toVOXml()->getValue();
    }

    /**
     * @param  Json  $json
     * @return static
     */
    public static function fromVOJson(Json $json)
    {
        return static::fromArray($json->toArray());
    }

    /**
     * @param  string $json
     * @return static
     */
    public static function fromJson($json)
    {
        return self::fromVOJson(Json::fromString($json));
    }

    /**
     * @return static
     */
    public function toVOJson()
    {
        return Json::fromArray($this->toArray());
    }

    /**
     * @return string
     */
    public function toJson()
    {
        return $this->toVOJson()->getValue();
    }
}
