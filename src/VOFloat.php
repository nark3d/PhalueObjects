<?php

namespace BestServedCold\PhalueObjects;

use BestServedCold\PhalueObjects\Contract\Diffable;
use BestServedCold\PhalueObjects\Contract\ValueObject as ValueObjectInterface;
use BestServedCold\PhalueObjects\Contract\VOFloatable;
use BestServedCold\PhalueObjects\Exception\InvalidTypeException;
use BestServedCold\PhalueObjects\VOFloat\Mixin;

/**
 * Class VOFloat
 *
 * @package   BestServedCold\PhalueObjects\Mathematical
 * @author    Adam Lewis <adam.lewis@bestservedcold.com>
 * @copyright Copyright (c) 2015 Best Served Cold Media Limited
 * @license   http://http://opensource.org/licenses/GPL-3.0 GPL License
 * @link      http://bestservedcold.com
 * @since     0.0.1-alpha
 * @version   0.0.2-alpha
 */
class VOFloat extends ValueObject implements \Countable, Diffable, VOFloatable
{
    use Mixin;

    /**
     * @param $value
     */
    public function __construct($value)
    {
        if (!is_float($value) && ! is_int($value)) {
            throw new InvalidTypeException($value, [ 'float' ]);
        }

        parent::__construct($value);
    }

    /**
     * @return float
     */
    public function getValue()
    {
        return (float) parent::getValue();
    }

    /**
     * @param  float  $float
     * @return static
     */
    public static function fromFloat($float)
    {
        return new static($float);
    }

    /**
     * @return float
     */
    public function toFloat()
    {
        return $this->getValue();
    }

    /**
     * @return float
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
