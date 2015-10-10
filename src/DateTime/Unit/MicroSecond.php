<?php

namespace BestServedCold\PhalueObjects\DateTime\Unit;

use BestServedCold\PhalueObjects\DateTime\DateTimeInterface;
use BestServedCold\PhalueObjects\DateTime\DateTimeTrait;
use BestServedCold\PhalueObjects\Mathematical\FloatVO;

/**
 * Class MicroSecond
 *
 * @package   BestServedCold\PhalueObjects\DateTime\Unit
 * @author    Adam Lewis <adam.lewis@bestservedcold.com>
 * @copyright Copyright (c) 2015 Best Served Cold Media Limited
 * @license	  http://http://opensource.org/licenses/GPL-3.0 GPL License
 * @link	  http://bestservedcold.com
 * @since	  0.0.1-alpha
 * @version   0.0.2-alpha
 */
final class MicroSecond extends FloatVO implements DateTimeInterface
{
    use DateTimeTrait;

    /**
     * Now.
     *
     * @return static
     */
    public static function now()
    {
        return self::getMicroTimeAsInteger(microtime());
    }

    /**
     * From String.
     *
     * @param  $string
     * @return static
     */
    public static function fromString($string)
    {
        return new static((float) $string);
    }

    /**
     * From Native
     *
     * @param \DateTime $native
     * @return DateTimeInterface
     */
    public static function fromNative(\DateTime $native)
    {
        return new static(floatval('0.' . $native->format('u')));
    }

    /**
     * @param string $microTime
     */
    public static function getMicroTimeAsInteger($microTime)
    {
        return new static(round((float) explode(' ', $microTime)[ 0 ], 6));
    }
}
