<?php

namespace BestServedCold\PhalueObjects\Format;

use BestServedCold\PhalueObjects\Contract\Arrayable;
use BestServedCold\PhalueObjects\ValueObject;

/**
 * Class Csv
 *
 * @package BestServedCold\PhalueObjects\Format
 */
class Csv extends ValueObject implements Arrayable
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
     * @return array
     */
    public function toArray()
    {
        return explode(',', $this->getValue());
    }
}
