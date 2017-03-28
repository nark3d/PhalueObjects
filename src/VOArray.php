<?php

namespace BestServedCold\PhalueObjects;

use BestServedCold\PhalueObjects\Contract\Arrayable;
use BestServedCold\PhalueObjects\Contract\Diffable;
use BestServedCold\PhalueObjects\Contract\ValueObject as ValueObjectInterface;
use BestServedCold\PhalueObjects\VOArray\Iterator as IteratorTrait;
use BestServedCold\PhalueObjects\VOArray\Key;
use BestServedCold\PhalueObjects\VOArray\Metric;
use BestServedCold\PhalueObjects\VOArray\Mutate;
use BestServedCold\PhalueObjects\VOArray\Pointer;
use Iterator;

/**
 * Class VOArray
 *
 * @package   BestServedCold\PhalueObjects\ValueObject
 * @author    Adam Lewis <adam.lewis@bestservedcold.com>
 * @copyright Copyright (c) 2015 Best Served Cold Media Limited
 * @license   http://http://opensource.org/licenses/GPL-3.0 GPL License
 * @link      http://bestservedcold.com
 * @since     0.0.1-alpha
 * @version   0.0.2-alpha
 */
class VOArray extends ValueObject implements Iterator, Arrayable, \Countable, Diffable
{
    use IteratorTrait, Key, Mutate, Pointer, Metric;

    /**
     * ArrayValueObject constructor.
     *
     * @param $value
     */
    public function __construct(array $value)
    {
        parent::__construct($value);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) serialize($this->getValue());
    }

    /**
     * @return mixed
     */
    public function toArray()
    {
        return $this->getValue();
    }

    /**
     * @param array $array
     * @return static
     */
    public static function fromArray(array $array)
    {
        return new static($array);
    }

    /**
     * @param  string $glue
     * @return string
     */
    public function implode($glue = ',')
    {
        return implode($glue, $this->getValue());
    }

    /**
     * @return array
     */
    public function getValue()
    {
        return (array) parent::getValue();
    }

    /**
     * @param  ValueObjectInterface $object
     * @return static
     */
    public function diff(ValueObjectInterface $object)
    {
        return new static(array_diff_assoc($this->getValue(), $object->getValue()));
    }
}
