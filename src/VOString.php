<?php

namespace BestServedCold\PhalueObjects;

use BestServedCold\PhalueObjects\Contract\Diffable;
use BestServedCold\PhalueObjects\Contract\VOStringable;
use BestServedCold\PhalueObjects\Exception\InvalidTypeException;
use BestServedCold\PhalueObjects\Contract\ValueObject as ValueObjectInterface;
use BestServedCold\PhalueObjects\VOString\Mixin;

/**
 * Class String
 *
 * @package   BestServedCold\PhalueObjects
 * @author    Adam Lewis <adam.lewis@bestservedcold.com>
 * @copyright Copyright (c) 2015 Best Served Cold Media Limited
 * @license   http://http://opensource.org/licenses/GPL-3.0 GPL License
 * @link      http://bestservedcold.com
 * @since     0.0.1-alpha
 * @version   0.0.2-alpha
 */
class VOString extends ValueObject implements VOStringable, \Countable, Diffable
{
    use Mixin;

    /**
     * VOString constructor.
     *
     * @param  $value
     * @throws InvalidTypeException
     */
    public function __construct($value)
    {
        if (! is_string($value)) {
            throw new InvalidTypeException($value, ['string']);
        }

        parent::__construct($value);
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return (string) parent::getValue();
    }

    /**
     * @return string
     */
    public function toString()
    {
        return $this->getValue();
    }

    /**
     * @param  string $string
     * @return static
     */
    public static function fromString($string)
    {
        return new static($string);
    }

    /**
     * @return int
     */
    public function count()
    {
        return strlen($this->getValue());
    }

    /**
     * @param  ValueObjectInterface $object
     * @return static
     */
    public function diff(ValueObjectInterface $object)
    {
        return new static(str_replace($object->getValue(), '', $this->getValue()));
    }

    /**
     * @return string
     */
    public function getNumbers()
    {
        return preg_replace('/[^0-9]+/', '', $this->getValue());
    }

    /**
     * @return string
     */
    public function getLetters()
    {
        return preg_replace('/[^A-Za-z]+/', '', $this->getValue());
    }
}
