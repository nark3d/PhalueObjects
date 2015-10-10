<?php

namespace BestServedCold\PhalueObjects\DateTime;

use BestServedCold\PhalueObjects\ValueObjectInterface;

/**
 * Class DateTime
 *
 * @package   BestServedCold\PhalueObjects
 * @author    Adam Lewis <adam.lewis@bestservedcold.com>
 * @copyright Copyright (c) 2015 Best Served Cold Media Limited
 * @license	  http://http://opensource.org/licenses/GPL-3.0 GPL License
 * @link	  http://bestservedcold.com
 * @since	  0.0.1-alpha
 * @version   0.0.2-alpha
 */
interface DateTimeInterface extends ValueObjectInterface
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
     * @return DateTimeInterface
     */
    public static function fromNative(\DateTime $native);

    /**
     * From String
     *
     * @param  string $string
     * @return DateTimeInterface
     */
    public static function fromString($string);
}
