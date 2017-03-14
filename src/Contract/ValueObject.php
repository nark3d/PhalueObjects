<?php

namespace BestServedCold\PhalueObjects\Contract;

/**
 * Interface ValueObjectInterface
 * 
 * @package  BestServedCold\PhalueObjects\Contract
 */
interface ValueObject
{
    /**
     * @return string
     */
    public function __toString();

    /**
     * @param  $field
     * @param  $value
     * @throws \RuntimeException
     */
    public function __set($field, $value);

    /**
     * @return mixed
     */
    public function getValue();
}
