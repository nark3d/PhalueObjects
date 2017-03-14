<?php namespace BestServedCold\PhalueObjects\Mathematical\Range;

use BestServedCold\PhalueObjects\Exception\InvalidRangeTypeException;
use BestServedCold\PhalueObjects\Mathematical;
use BestServedCold\PhalueObjects\Mathematical\Range;

/**
 * Class RangeTrait
 *
 * @package   BestServedCold\PhalueObjects\Mathematical\Range
 * @author    Adam Lewis <adam.lewis@bestservedcold.com>
 * @copyright Copyright (c) 2015 Best Served Cold Media Limited
 * @license      http://http://opensource.org/licenses/GPL-3.0 GPL License
 * @link      http://bestservedcold.com
 * @since      0.0.1-alpha
 * @version   0.0.2-alpha
 */
trait RangeTrait
{
    /**
     * @return int
     */
    abstract public function getMaximum();

    /**
     * @return int
     */
    abstract public function getMinimum();

    /**
     * @param $value
     */
    public function __construct($value)
    {
        if (method_exists(get_parent_class($this), '__construct')) {
            parent::__construct($value);
        }

        if (
            !(
                new Range(
                    $this->getMaximum(),
                    $this->getMinimum())
                )->inRange(new Mathematical($value))
        ) {

            throw new InvalidRangeTypeException(
                $value,
                [ 'Mathematical' ],
                $this->getMinimum(),
                $this->getMaximum()
            );
        }

    }
}
