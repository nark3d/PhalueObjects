<?php

namespace BestServedCold\PhalueObjects\ValueObject;

use BestServedCold\PhalueObjects\ValueObject;

/**
 * Class MultipleValue
 *
 * @package   BestServedCold\PhalueObjects\ValueObject
 * @author    Adam Lewis <adam.lewis@bestservedcold.com>
 * @copyright Copyright (c) 2015 Best Served Cold Media Limited
 * @license	  http://http://opensource.org/licenses/GPL-3.0 GPL License
 * @link	  http://bestservedcold.com
 * @since	  0.0.1-alpha
 * @version   0.0.2-alpha
 */
abstract class MultipleValue extends ValueObject
{
    /**
     */
    public function __construct()
    {
        parent::__construct(func_get_args());
    }

    /**
     * @param  MultipleValue $object
     * @return bool
     */
    public function equals(ValueObject $object)
    {
        return serialize($this->getValue()) === serialize($object->getValue());
    }

    public function __toString()
    {
        return (string) serialize($this->getValue());
    }
}
