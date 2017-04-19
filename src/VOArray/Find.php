<?php

namespace BestServedCold\PhalueObjects\VOArray;

use BestServedCold\PhalueObjects\Format\String\Json\Notation;
use BestServedCold\PhalueObjects\VOArray;

/**
 * Class Find
 *
 * @package BestServedCold\PhalueObjects\VOArray
 */
class Find extends VOArray
{
    /**
     * @param  Notation $notation
     * @return bool
     */
    public function jsonNotation(Notation $notation)
    {
        return $this->voArray($notation->toVOArray());
    }

    /**
     * @param  array $array
     * @return bool|mixed
     */
    public function nativeArray(array $array)
    {
        return $this->voArray(VOArray::fromArray($array));
    }

    /**
     * Iterates through an array of values and finds a key.  If it makes it to the final value,
     * it returns what ever value matches that key.
     *
     * @param  VOArray    $arrayValueObject
     * @return bool|mixed
     */
    public function voArray(VOArray $arrayValueObject)
    {
        $key = VOArray::fromArray($this->getValue())->getKey($arrayValueObject->current());
        if ($key) {
            return $arrayValueObject->isLast() ? $key
                : static::fromArray($key)
                    ->voArray($arrayValueObject->dropFirst());
        }

        return false;
    }

    /**
     * @param  $arrayValue
     * @return int|string
     */
    public function keyFromArrayValue($arrayValue)
    {
        foreach ($this->getValue() as $key => $value) {
            if (in_array(strtolower($arrayValue), array_map('strtolower', $value))) {
                return $key;
            }
        }

        return false;
    }
}
