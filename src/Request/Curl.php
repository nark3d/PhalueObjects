<?php

namespace BestServedCold\PhalueObjects\Request;

use BestServedCold\PhalueObjects\Contract\AutoDependency;
use BestServedCold\PhalueObjects\Contract\Request;
use BestServedCold\PhalueObjects\Exception\InvalidTypeException;
use BestServedCold\PhalueObjects\VOResource;

/**
 * Class Curl
 *
 * @package BestServedCold\PhalueObjects\Request
 */
class Curl extends VOResource implements Request, AutoDependency
{
    /**
     * @var array $options
     */
    protected static $options = [];

    /**
     * Curl constructor.
     *
     * @param $value
     */
    public function __construct($value)
    {
        if (! is_resource($value) || get_resource_type($value) !== 'curl') {
            throw new InvalidTypeException($value, [ 'curl resource' ]);
        }

        parent::__construct($value);
    }

    /**
     * @param  $resource
     * @param  array     $options
     * @return static
     */
    public static function fromOptions($resource, array $options = [])
    {
        return new static(self::setOptions($resource, self::$options + $options));
    }

    /**
     * @param  array  $options
     * @return static
     */
    public static function auto(array $options = [])
    {
        return self::fromOptions(curl_init(), $options);
    }

    /**
     * @param array $options
     * @param $resource
     */
    protected static function setOptions($resource, array $options)
    {
        foreach ($options as $name => $value) {
            curl_setopt($resource, $name, $value);
        }

        return $resource;
    }

    /**
     * @return mixed
     */
    public function getContents()
    {
        return curl_exec($this->getValue());
    }

    /**
     * @return mixed
     */
    public function getInfo()
    {
        return curl_getinfo($this->getValue());
    }

    /**
     * @inheritdoc
     */
    public function close()
    {
        curl_close($this->getValue());
    }

    /**
     * @inheritdoc
     */
    public function __destruct()
    {
        $this->close();
    }
}
