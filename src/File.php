<?php namespace BestServedCold\PhalueObjects;

use BestServedCold\PhalueObjects\Format\Json;
use BestServedCold\PhalueObjects\Format\Xml;
use BestServedCold\PhalueObjects\Format\Yaml;

/**
 * Class File
 *
 * @package BestServedCold\PhalueObjects
 */
class File extends ValueObject
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
     * @param array $value
     * @param bool $mustExist
     * @param int $timeout
     */
    public function __construct($value, $mustExist = true, $timeout = 10)
    {
        parent::__construct($value);
        $this->timeout = $timeout;
        $this->mustExist = $mustExist;
    }

    /**
     * @return bool
     */
    public function exists()
    {
        return file_exists($this->getValue());
    }

    /**
     * @return string
     */
    public function getContents()
    {
        return !$this->mustExist || $this->exists()
            ? file_get_contents($this->getValue())
            : false;
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
        return new VOString($this->getContents());
    }

    /**
     * @return Xml
     */
    public function toXml()
    {
        return Xml::fromString($this->getContents());
    }

    /**
     * @return Json
     */
    public function toJson()
    {
        return Json::fromString($this->getContents());
    }

    /**
     * @return Yaml
     */
    public function toYaml()
    {
        return Yaml::fromString($this->getContents());
    }
}
