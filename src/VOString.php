<?php

namespace BestServedCold\PhalueObjects;

use BestServedCold\PhalueObjects\Exception\InvalidTypeException;
use BestServedCold\PhalueObjects\VOArray\Map;

/**
 * Class String
 *
 * @package   BestServedCold\PhalueObjects
 * @author    Adam Lewis <adam.lewis@bestservedcold.com>
 * @copyright Copyright (c) 2015 Best Served Cold Media Limited
 * @license      http://http://opensource.org/licenses/GPL-3.0 GPL License
 * @link      http://bestservedcold.com
 * @since      0.0.1-alpha
 * @version   0.0.2-alpha
 */
class VOString extends ValueObject
{
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
}
