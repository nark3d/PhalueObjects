<?php

namespace BestServedCold\PhalueObjects\Format;

use BestServedCold\PhalueObjects\Contract\Arrayable;
use BestServedCold\PhalueObjects\Contract\VOArrayable;
use BestServedCold\PhalueObjects\ValueObject;
use BestServedCold\PhalueObjects\VOArray;

/**
 * Class Csv
 *
 * @package BestServedCold\PhalueObjects\Format
 */
class Csv extends ValueObject implements Arrayable, VOArrayable
{
    /**
     * @param  array       $array
     * @param  string|null $space
     * @return static
     */
    public static function fromArray(array $array, $space = null)
    {
        return new static(implode(',' . $space, $array));
    }

    /**
     * @param  VOArray $voArray
     * @return static
     */
    public static function fromVOArray(VOArray $voArray)
    {
        return self::fromArray($voArray->getValue());
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return explode(',', $this->getValue());
    }

    /**
     * @return VOArray
     */
    public function toVOArray()
    {
        return VOArray::fromArray(self::toArray());
    }
}
