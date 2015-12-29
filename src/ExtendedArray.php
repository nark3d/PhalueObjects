<?php

namespace BestServedCold\PhalueObjects;

use BestServedCold\PhalueObjects\Exception\InvalidTypeException;

/**
 * Class ExtendedArray
 *
 * @package   BestServedCold\PhalueObjects
 * @author    Adam Lewis <adam.lewis@bestservedcold.com>
 * @copyright Copyright (c) 2015 Best Served Cold Media Limited
 * @license	  http://http://opensource.org/licenses/GPL-3.0 GPL License
 * @link	  http://bestservedcold.com
 * @since	  0.0.1-alpha
 * @version   0.0.2-alpha
 */
class ExtendedArray extends ValueObject
{
    /***
     * @param $value
     */
    public function __construct($value)
    {
        if (!is_array($value)) {
            throw new InvalidTypeException($value, [ 'array' ]);
        }

        parent::__construct($value);
    }
}
