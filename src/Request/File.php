<?php

namespace BestServedCold\PhalueObjects\Request;

use BestServedCold\PhalueObjects\Contract\Request;
use BestServedCold\PhalueObjects\VOObject;

/**
 * Class File
 *
 * @package BestServedCold\PhalueObjects\Request
 */
class File extends VOObject implements Request
{
    /**
     * File constructor.
     *
     * @param \SplFileObject $value
     */
    public function __construct(\SplFileObject $value)
    {
        parent::__construct($value);
    }

    /**
     * @param  \SplFileObject $splFileObject
     * @return static
     */
    public static function fromFileObject(\SplFileObject $splFileObject)
    {
        return new static($splFileObject);
    }

    /**
     * @param $path
     * @return static
     */
    public static function fromPath($path)
    {
        return static::fromFileObject(new \SplFileObject($path));
    }

    /**
     * @return string
     */
    public function getContents()
    {
        return $this->getValue()->fread($this->getValue()->getSize());
    }

    /**
     * @return \SplFileObject
     */
    public function getInfo()
    {
        return $this->getValue()->getFileInfo($this->getType());
    }
}
