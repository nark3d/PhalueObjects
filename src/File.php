<?php namespace BestServedCold\PhalueObjects;

class File extends ValueObject
{
    protected $checkExists = true;
    protected $timeout;
    protected $mustExist;

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
        return ! $this->mustExist || $this->exists()
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
     * @param string $string
     * @return static
     */
    public static function fromString($string)
    {
        return new static($string);
    }
}
