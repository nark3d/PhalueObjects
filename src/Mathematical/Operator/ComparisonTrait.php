<?php

namespace BestServedCold\PhalueObjects\Mathematical\Operator;

use BestServedCold\PhalueObjects\ValueObjectInterface;

/**
 * Class ComparisonTrait
 *
 * @package   BestServedCold\PhalueObjects\Mathematical\Operator
 * @author    Adam Lewis <adam.lewis@bestservedcold.com>
 * @copyright Copyright (c) 2015 Best Served Cold Media Limited
 * @license	  http://http://opensource.org/licenses/GPL-3.0 GPL License
 * @link	  http://bestservedcold.com
 * @since	  0.0.1-alpha
 * @version   0.0.2-alpha
 */
trait ComparisonTrait
{
    /**
     * @return int
     */
    public abstract function getValue();

    /**
     * @param ValueObjectInterface $object
     * @return bool
     */
    public function isGreaterThan(ValueObjectInterface $object)
    {
        return $this->getValue() > $object->getValue();
    }

    /**
     * @param  ValueObjectInterface $object
     * @return bool
     */
    public function isLessThan(ValueObjectInterface $object)
    {
        return $this->getValue() < $object->getValue();
    }

    /**
     * @param  ValueObjectInterface $object
     * @return bool
     */
    public function isGreaterThanOrEqualTo(ValueObjectInterface $object)
    {
        return $this->getValue() >= $object->getValue();
    }

    /**
     * @param  ValueObjectInterface $object
     * @return bool
     */
    public function isLessThanOrEqualTo(ValueObjectInterface $object)
    {
        return $this->getValue() <= $object->getValue();
    }

    /**
     * @param  ValueObjectInterface $object
     * @return int
     */
    public function spaceship(ValueObjectInterface $object)
    {
        return ($this->getValue() < $object->getValue())
                ? -1
                : (
                ($this->getValue() > $object->getValue())
                    ? 1
                    : 0
                );
    }
}
