<?php namespace BestServedCold\PhalueObjects;

use BestServedCold\PhalueObjects\ValueObject\SingleValue;

class File extends SingleValue
{
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
        return $this->exists() ? file_get_contents($this->getValue()) : false;
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

    public static function fromString($string)
    {
        return new static($string);
    }
}
