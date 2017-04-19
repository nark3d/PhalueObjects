<?php

namespace BestServedCold\PhalueObjects\Format\String;

use BestServedCold\PhalueObjects\Contract\VOArrayable;
use Sabre\Xml\Service;

/**
 * Class Xml
 *
 * @package BestServedCold\PhalueObjects\Format
 */
class Xml extends AbstractString implements VOArrayable
{
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
     * @return static
     */
    public static function fromArray(array $array)
    {
        if (count($array) > 1) {
            throw new \InvalidArgumentException('Array must only have one element.');
        }

        return new static((new Service())->write(key($array), reset($array)));
    }
}
