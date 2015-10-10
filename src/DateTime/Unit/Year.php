<?php

namespace BestServedCold\PhalueObjects\DateTime\Unit;

use BestServedCold\PhalueObjects\DateTime\DateTimeInterface;
use BestServedCold\PhalueObjects\DateTime\DateTimeTrait;
use BestServedCold\PhalueObjects\Mathematical\Integer;

/**
 * Class Year
 *
 * @package   BestServedCold\PhalueObjects\DateTime\Unit
 * @author    Adam Lewis <adam.lewis@bestservedcold.com>
 * @copyright Copyright (c) 2015 Best Served Cold Media Limited
 * @license	  http://http://opensource.org/licenses/GPL-3.0 GPL License
 * @link	  http://bestservedcold.com
 * @since	  0.0.1-alpha
 * @version   0.0.2-alpha
 */
final class Year extends Integer implements DateTimeInterface
{
    use DateTimeTrait;

    /**
     * @param int $value
     */
    public function __construct($value)
    {
        parent::__construct($value);
        $this->native = new \DateTime("$value-01-01");
    }

    /***
     * @return bool
     */
    public function isLeap()
    {
        return $this->native->format('L') === '1' ? true : false;
    }

    /**
     * Now.
     *
     * @return static
     */
    public static function now()
    {
        return new static(self::getNowDateTimeFormat('Y'));
    }

    /**
     * From String.
     *
     * @param  $string
     *
     * @return static
     */
    public static function fromString($string)
    {
        return new static((int) $string);
    }

    /**
     * From Native
     *
     * @param \DateTime $native
     * @return DateTimeInterface
     */
    public static function fromNative(\DateTime $native)
    {
        return new static((int) $native->format('Y'));
    }
}
