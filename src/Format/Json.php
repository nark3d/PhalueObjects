<?php

namespace BestServedCold\PhalueObjects\Format;

use BestServedCold\PhalueObjects\Contract\Arrayable;
use BestServedCold\PhalueObjects\Contract\VOArrayable;
use BestServedCold\PhalueObjects\Format;
use BestServedCold\PhalueObjects\VOArray;

/**
 * Class Json
 *
 * @package BestServedCold\PhalueObjects\Format
 */
class Json extends Format implements Arrayable, VOArrayable
{
    /**
     * @return array
     */
    public function toArray()
    {
        return (array) json_decode($this->getValue(), true);
    }

    /**
     * @param  array  $array
     * @return static
     */
    public static function fromArray(array $array)
    {
        return new static(json_encode($array));
    }

    /**
     * @param  VOArray $voArray
     * @return Json
     */
    public static function fromVOArray(VOArray $voArray)
    {
        return self::fromArray($voArray->getValue());
    }

    /**
     * @return VOArray
     */
    public function toVOArray()
    {
        return VOArray::fromArray(self::toArray());
    }
}
