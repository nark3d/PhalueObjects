<?php

namespace BestServedCold\PhalueObjects\Format;

use BestServedCold\PhalueObjects\VOArray\Mixin;

/**
 * Class SringMixin
 *
 * @package BestServedCold\PhalueObjects\Format
 */
trait StringMixin
{
    use Mixin;

    /**
     * @param  Yaml $yaml
     * @return Json
     */
    public static function fromYaml(Yaml $yaml)
    {
        return static::fromArray($yaml->toArray());
    }

    /**
     * @return Yaml
     */
    public function toYaml()
    {
        return Yaml::fromArray($this->toArray());
    }

    /**
     * @param  Xml  $xml
     * @return Json
     */
    public function fromXml(Xml $xml)
    {
        return static::fromArray($xml->toArray());
    }

    /**
     * @return string
     */
    public function toXml()
    {
        return Xml::fromArray($this->toArray());
    }
}
