<?php

namespace BestServedCold\PhalueObjects\Mathematical;

use BestServedCold\PhalueObjects\Exception\InvalidTypeException;
use BestServedCold\PhalueObjects\Mathematical;

/**
 * Class Integer
 *
 * @package   BestServedCold\PhalueObjects\Mathematical
 * @author    Adam Lewis <adam.lewis@bestservedcold.com>
 * @copyright Copyright (c) 2015 Best Served Cold Media Limited
 * @license	  http://http://opensource.org/licenses/GPL-3.0 GPL License
 * @link	  http://bestservedcold.com
 * @since	  0.0.1-alpha
 * @version   0.0.2-alpha
 */
class Integer extends Mathematical
{
    public function __construct($value)
    {
        if (!is_int($value)) {
            throw new InvalidTypeException($value, [ 'integer' ]);
        }

        parent::__construct($value);
    }
}
