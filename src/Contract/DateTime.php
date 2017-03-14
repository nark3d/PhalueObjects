<?php

namespace BestServedCold\PhalueObjects\Contract;

/**
 * Interface DateTime
 *
 * @package   BestServedCold\PhalueObjects\Contract
 * @author    Adam Lewis <adam.lewis@bestservedcold.com>
 * @copyright Copyright (c) 2015 Best Served Cold Media Limited
 * @license   http://http://opensource.org/licenses/GPL-3.0 GPL License
 * @link      http://bestservedcold.com
 * @since     0.0.1-alpha
 * @version   0.0.2-alpha
 */
interface DateTime
{
    /**
     * Now.
     *
     * @return static
     */
    public static function now();

    /**
     * From Native
     *
     * @param \DateTime $native
     * @return DateTime
     */
    public static function fromNative(\DateTime $native);

    /**
     * From String
     *
     * @param  string $string
     * @return DateTime
     */
    public static function fromString($string);
}
