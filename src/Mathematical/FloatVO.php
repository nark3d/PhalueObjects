<?php

namespace BestServedCold\PhalueObjects\Mathematical;

use BestServedCold\PhalueObjects\Exception\InvalidTypeException;
use BestServedCold\PhalueObjects\Mathematical;

/**
 * Class FloatVO
 *
 * @package   BestServedCold\PhalueObjects\Mathematical
 * @author    Adam Lewis <adam.lewis@bestservedcold.com>
 * @copyright Copyright (c) 2015 Best Served Cold Media Limited
 * @license	  http://http://opensource.org/licenses/GPL-3.0 GPL License
 * @link	  http://bestservedcold.com
 * @since	  0.0.1-alpha
 * @version   0.0.2-alpha
 */
class FloatVO extends Mathematical
{
    /**
     * @var int|null
     */
    protected $round = null;

    /**
     * @param double $value
     */
    public function __construct($value, $round = null)
    {
        if (!filter_var($value, FILTER_VALIDATE_FLOAT)) {
            throw new InvalidTypeException($value, [ 'float' ]);
        }

        $value = $round ? $this->round($value, $round) : $value;

        $this->round = $round;

        parent::__construct($value);
    }

    /**
     * @param  $value
     * @param  $round
     * @return float
     */
    public function round($value, $round)
    {
        return round($value, $round);
    }

    /**
     * @return float
     */
    public function getValue()
    {
        return $this->round
            ? $this->round($this->value, $this->round)
            : $this->value;
    }
}
