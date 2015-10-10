<?php

namespace BestServedCold\PhalueObjects;

/**
 * Interface ValueObjectInterface
 * @package  BestServedCold\PhalueObjects
 */
interface ValueObjectInterface
{
    /**
     * @return string
     */
    public function __toString();

    /**
     * @param  $field
     * @param  $value
     * @return mixed
     */
    public function __set($field, $value);
}
