<?php

namespace BestServedCold\PhalueObjects\Mathematical;

use BestServedCold\PhalueObjects\Format\Csv;
use BestServedCold\PhalueObjects\Mathematical;
use BestServedCold\PhalueObjects\Variadic;

/**
 * Class Range
 *
 * @package   BestServedCold\PhalueObjects\Mathematical
 * @author    Adam Lewis <adam.lewis@bestservedcold.com>
 * @copyright Copyright (c) 2015 Best Served Cold Media Limited
 * @license      http://http://opensource.org/licenses/GPL-3.0 GPL License
 * @link      http://bestservedcold.com
 * @since      0.0.1-alpha
 * @version   0.0.2-alpha
 */
class Range extends Variadic
{
    /**
     * @var mixed
     */
    protected $minimum;

    /**
     * @var mixed
     */
    protected $maximum;

    /**
     * @param bool $maximum
     * @param bool $minimum
     */
    public function __construct($maximum, $minimum)
    {
        $this->maximum = $maximum;
        $this->minimum = $minimum;
        parent::__construct($maximum, $minimum);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return Csv::fromArray([ $this->maximum, $this->minimum ], ' ')->getValue();
    }

    /**
     * @param  Mathematical $mathematical
     * @return bool
     */
    public function inRange(Mathematical $mathematical)
    {
        return (
            $this->minimum <= $mathematical->getValue()
        ) && (
            $this->maximum >= $mathematical->getValue()
        );
    }
}
