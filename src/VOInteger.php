<?php

namespace BestServedCold\PhalueObjects;

use BestServedCold\PhalueObjects\Contract\Diffable;
use BestServedCold\PhalueObjects\Contract\ValueObject as ValueObjectInterface;
use BestServedCold\PhalueObjects\Exception\InvalidTypeException;

/**
 * Class VOInteger
 *
 * @package   BestServedCold\PhalueObjects\Mathematical
 * @author    Adam Lewis <adam.lewis@bestservedcold.com>
 * @copyright Copyright (c) 2015 Best Served Cold Media Limited
 * @license   http://http://opensource.org/licenses/GPL-3.0 GPL License
 * @link      http://bestservedcold.com
 * @since     0.0.1-alpha
 * @version   0.0.2-alpha
 */
class VOInteger extends ValueObject implements \Countable, Diffable
{
    /**
     * @param $value
     */
    public function __construct($value)
    {
        if (!is_int($value)) {
            throw new InvalidTypeException($value, [ 'integer' ]);
        }

        parent::__construct($value);
    }

    /**
     * @return integer
     */
    public function getValue()
    {
        return (integer) parent::getValue();
    }

    /**
     * @return integer
     */
    public function count()
    {
        return $this->getValue();
    }

    /**
     * @param  ValueObjectInterface $object
     * @return static
     */
    public function diff(ValueObjectInterface $object)
    {
        return new static($this->getValue() - $object->getValue());
    }
}
