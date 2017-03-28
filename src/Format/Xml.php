<?php

namespace BestServedCold\PhalueObjects\Format;

use BestServedCold\PhalueObjects\Contract\VOArrayable;
use BestServedCold\PhalueObjects\VOString;
use BestServedCold\PhalueObjects\VOArray\Mixin as VOArrayMixin;
use Sabre\Xml\Service;

/**
 * Class Xml
 *
 * @package BestServedCold\PhalueObjects\Format
 */
class Xml extends VOString implements VOArrayable
{
    use VOArrayMixin;

    /**
     * @return array
     */
    public function toArray()
    {
        return (array) (new Service())->parse($this->getValue());
    }

    /**
     * @param  array  $array
     * @throws \InvalidArgumentException
     * @return string
     */
    public static function fromArray(array $array)
    {
        if (count($array) > 1) {
            throw new \InvalidArgumentException('Array must only have one element.');
        }

        return new static((new Service())->write(key($array), reset($array)));
    }
}
