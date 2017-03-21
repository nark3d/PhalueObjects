<?php namespace BestServedCold\PhalueObjects;

use BestServedCold\PhalueObjects\Format\Json;
use BestServedCold\PhalueObjects\Format\Xml;
use BestServedCold\PhalueObjects\Format\Yaml;

/**
 * Class File
 *
 * @package BestServedCold\PhalueObjects
 */
abstract class File extends ValueObject
{
    /**
     * @var int
     */
    protected $timeout;

    /**
     * @var bool
     */
    protected $mustExist;

    /**
     * File constructor.
     *
     * @param string $value
     * @param bool   $mustExist
     * @param int    $timeout
     */
    public function __construct($value, $mustExist = true, $timeout = 10)
    {
        parent::__construct($value);
        $this->timeout = $timeout;
        $this->mustExist = $mustExist;
    }

    /**
     * @return string
     */
    public function getExtension()
    {
        return pathinfo($this->getValue(), PATHINFO_EXTENSION);
    }

    /**
     * @return string
     */
    public function getDirectoryName()
    {
        return pathinfo($this->getValue(), PATHINFO_DIRNAME);
    }

    /**
     * @return string
     */
    public function getFileName()
    {
        return pathinfo($this->getValue(), PATHINFO_FILENAME);
    }

    /**
     * @return VOString
     */
    public function toVOString()
    {
        return new VOString($this->getValue());
    }

    /**
     * @return Xml
     */
    public function toXml()
    {
        return Xml::fromString($this->getValue());
    }

    /**
     * @return Json
     */
    public function toJson()
    {
        return Json::fromString($this->getValue());
    }

    /**
     * @return Yaml
     */
    public function toYaml()
    {
        return Yaml::fromString($this->getValue());
    }
}
