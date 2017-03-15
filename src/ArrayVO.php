<?php

namespace BestServedCold\PhalueObjects;

use BestServedCold\PhalueObjects\Contract\Arrayable;
use BestServedCold\PhalueObjects\Contract\Countable;
use BestServedCold\PhalueObjects\Exception\InvalidTypeException;
use BestServedCold\PhalueObjects\Format\Json\Notation;
use Iterator;

/**
 * Class ArrayVO
 *
 * @package   BestServedCold\PhalueObjects\ValueObject
 * @author    Adam Lewis <adam.lewis@bestservedcold.com>
 * @copyright Copyright (c) 2015 Best Served Cold Media Limited
 * @license   http://http://opensource.org/licenses/GPL-3.0 GPL License
 * @link      http://bestservedcold.com
 * @since     0.0.1-alpha
 * @version   0.0.2-alpha
 */
class ArrayVO extends ValueObject implements Iterator, Arrayable, Countable
{
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
     * @param  $key
     * @return bool
     */
    public function keyExists($key)
    {
        return array_key_exists($key, $this->getValue());
    }

    /**
     * @return static
     */
    public function dropFirst()
    {
        return new static(array_slice($this->getValue(), 1, $this->count()));
    }

    /**
     * @return static
     */
    public function dropLast()
    {
        return new static(array_slice($this->getValue(), 0, -1));
    }

    /**
     * @param  Notation $notation
     * @return bool
     */
    public function findJsonNotation(Notation $notation)
    {
        return $this->findArrayVO($notation->toArrayVO());
    }

    /**
     * @param  array $array
     * @return bool|mixed
     */
    public function findArray(array $array)
    {
        return $this->findArrayVO(ArrayVO::fromArray($array));
    }

    /**
     * Iterates through an array of values and finds a key.  If it makes it to the final value,
     * it returns what ever value matches that key.
     *
     * @param  ArrayVO    $arrayValueObject
     * @return bool|mixed
     */
    public function findArrayVO(ArrayVO $arrayValueObject)
    {
        if ($key = $this->getKey($arrayValueObject->current())) {
            return $arrayValueObject->isLast() ? $key
                : ArrayVO::fromArray($key)
                    ->findArrayVO($arrayValueObject->dropFirst());
        }

        return false;
    }

    /**
     * @param  string|int $key
     * @return bool|mixed
     */
    public function getKey($key)
    {
        return $this->keyExists($key) ? $this->value[$key] : false;
    }

    /**
     * @return mixed
     */
    public function current()
    {
        return current($this->value);
    }

    /**
     * @return mixed
     */
    public function key()
    {
        return key($this->value);
    }

    /**
     * @return bool
     */
    public function valid()
    {
        return key($this->value) !== null && key($this->value) !== false;
    }

    /**
     * @return $this
     */
    public function next()
    {
        next($this->value);
        return $this;
    }

    /**
     * @return $this
     */
    public function rewind()
    {
        reset($this->value);
        return $this;
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->getValue());
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return empty($this->value);
    }

    /**
     * @return mixed
     */
    public function getFirstKey()
    {
        return array_shift(array_keys($this->value));
    }

    /**
     * @return array
     */
    public function getKeys()
    {
        return array_keys($this->value);
    }

    /**
     * @return mixed
     */
    public function getLastKey()
    {
        $keys = $this->getKeys();
        return end($keys);
    }

    /**
     * @return bool
     */
    public function isLast()
    {
        return $this->key() === $this->getLastKey();
    }

    /**
     * @param  ValueObject $object
     * @return bool
     */
    public function equals(ValueObject $object)
    {
        if (! $object instanceof ArrayVO) {
            throw new InvalidTypeException($object, [ ArrayVO::class ]);
        }

        return parent::equals($object);
    }

}
