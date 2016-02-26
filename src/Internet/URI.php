<?php

namespace BestServedCold\PhalueObjects;

use BestServedCold\PhalueObjects\Exception\InvalidTypeException;

/**
 * Class URI
 *
 * @package   BestServedCold\PhalueObjects
 * @author    Adam Lewis <adam.lewis@bestservedcold.com>
 * @copyright Copyright (c) 2015 Best Served Cold Media Limited
 * @license	  http://http://opensource.org/licenses/GPL-3.0 GPL License
 * @link	  http://bestservedcold.com
 * @since	  0.0.1-alpha
 * @version   0.0.2-alpha
 */
class URI extends ValueObject
{
    /**
     * @var string
     */
    protected $protocol;

    /**
     * @var string
     */
    protected $host;

    /**
     * @param $value
     */
    public function __construct($value)
    {
        if (!filter_var($value, FILTER_VALIDATE_URL)) {
            throw new InvalidTypeException($value, [ 'url' ]);
        }

        parent::__construct($value);
    }
}
