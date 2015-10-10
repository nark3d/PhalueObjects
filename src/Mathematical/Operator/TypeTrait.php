<?php

namespace BestServedCold\PhalueObjects\Mathematical\Operator;

/**
 * Class TypeTrait
 *
 * @package   BestServedCold\PhalueObjects\Mathematical\Operator
 * @author    Adam Lewis <adam.lewis@bestservedcold.com>
 * @copyright Copyright (c) 2015 Best Served Cold Media Limited
 * @license	  http://http://opensource.org/licenses/GPL-3.0 GPL License
 * @link	  http://bestservedcold.com
 * @since	  0.0.1-alpha
 * @version   0.0.2-alpha
 */
trait TypeTrait
{
    /**
     * @return int
     */
    public abstract function getValue();

    /**
     * @return bool
     */
    public function isPositive()
    {
        return $this->getValue() > 0;
    }

    /**
     * @return bool
     */
    public function isNegative()
    {
        return $this->getValue() < 0;
    }

    /**
     * @return bool
     */
    public function isZero()
    {
        return $this->getValue() === 0;
    }

    /**
     * @return bool
     */
    public function isNegativeOrZero()
    {
        return $this->isNegative() || $this->isZero();
    }

    /**
     * @return bool
     */
    public function isPositiveOrZero()
    {
        return $this->isPositive() || $this->isZero();
    }
}
