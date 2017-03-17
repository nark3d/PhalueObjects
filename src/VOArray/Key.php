<?php

namespace BestServedCold\PhalueObjects\VOArray;

/**
 * Class KeyTrait
 * @package BestServedCold\PhalueObjects
 */
trait Key
{
    /**
     * @param  string|int $key
     * @return bool|mixed
     */
    public function getKey($key)
    {
        return $this->keyExists($key) ? $this->getValue()[$key] : false;
    }

    /**
     * @return array
     */
    public function getKeys()
    {
        return array_keys($this->getValue());
    }

    /**
     * @return mixed
     */
    public function getFirstKey()
    {
        $keys = $this->getKeys();
        return array_shift($keys);
    }

    /**
     * @return mixed
     */
    public function getLastKey()
    {
        $keys = $this->getKeys();
        return end($keys);
    }

    /**
     * @param  $key
     * @return bool
     */
    public function keyExists($key)
    {
        return array_key_exists($key, $this->getValue());
    }

}
