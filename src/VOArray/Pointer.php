<?php

namespace BestServedCold\PhalueObjects\VOArray;

use BestServedCold\PhalueObjects\VOArray;

/**
 * Class Pointer
 *
 * @package BestServedCold\PhalueObjects\VOArray
 */
trait Pointer
{
    /**
     * @return bool
     */
    public function isLast()
    {
        return $this->key() === VOArray::fromArray($this->getValue())->getLastKey();
    }

    /**
     * @return bool
     */
    public function isFirst()
    {
        return $this->key() === VOArray::fromArray($this->getValue())->getFirstKey();
    }
}
