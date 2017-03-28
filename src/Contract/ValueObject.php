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

    /**
     * @param  ValueObject $object
     * @return bool
     */
    public function equals(ValueObject $object);

    /**
     * @return string
     */
    public function getType();

    /**
     * @return string
     */
    public function hash();

    /**
     * @inheritdoc
     */
    public function __destruct();
}
