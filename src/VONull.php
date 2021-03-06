<?php

namespace BestServedCold\PhalueObjects;

use BestServedCold\PhalueObjects\Exception\InvalidTypeException;

/**
 * Class Null
 *
 * @package   BestServedCold\PhalueObjects
 * @author    Adam Lewis <adam.lewis@bestservedcold.com>
 * @copyright Copyright (c) 2015 Best Served Cold Media Limited
 * @license   http://http://opensource.org/licenses/GPL-3.0 GPL License
 * @link      http://bestservedcold.com
 * @since     0.0.1-alpha
 * @version   0.0.2-alpha
 */
class VONull extends ValueObject
{
    /**
     * Null constructor.
     *
     * @param $value
     */
    public function __construct($value)
    {
        if (! is_null($value)) {
            throw new InvalidTypeException($value, ['object']);
        }

        parent::__construct($value);
    }

    /**
     * @return null
     */
    public function getValue()
    {
        return (unset) parent::getValue();
    }
}
