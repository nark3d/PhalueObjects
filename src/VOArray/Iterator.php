<?php

namespace BestServedCold\PhalueObjects\VOArray;

/**
 * Trait Iterator
 *
 * @package BestServedCold\PhalueObjects\VOArray
 */
trait Iterator
{
    /**
     * @return mixed
     */
    public function current()
    {
        return current($this->value);
    }

    /**
     * @return mixed
     */
    public function key()
    {
        return key($this->value);
    }

    /**
     * @return bool
     */
    public function valid()
    {
        return key($this->value) !== null && key($this->value) !== false;
    }

    /**
     * @return $this
     */
    public function next()
    {
        next($this->value);
        return $this;
    }

    /**
     * @return $this
     */
    public function rewind()
    {
        reset($this->value);
        return $this;
    }

    /**
     * @return $this
     */
    public function end()
    {
        end($this->value);
        return $this;
    }
}
