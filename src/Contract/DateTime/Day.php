<?php

namespace BestServedCold\PhalueObjects\Contract\DateTime;

/**
 * Interface Day
 *
 * @package   BestServedCold\PhalueObjects\DateTime\Unit
 * @author    Adam Lewis <adam.lewis@bestservedcold.com>
 * @copyright Copyright (c) 2015 Best Served Cold Media Limited
 * @license   http://http://opensource.org/licenses/GPL-3.0 GPL License
 * @link      http://bestservedcold.com
 * @since     0.0.1-alpha
 * @version   0.0.2-alpha
 */
interface Day
{
    /**
     * @return static
     */
    public function nextDay();

    /**
     * @return static
     */
    public function previousDay();
}
