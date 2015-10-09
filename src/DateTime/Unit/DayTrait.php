<?php namespace BestServedCold\PhalueObjects\DateTime\Unit;

use BestServedCold\PhalueObjects\DateTime\DateTimeTrait;

/**
 * Class DayTrait
 *
 * @package   BestServedCold\PhalueObjects\DateTime\Unit
 * @author    Adam Lewis <adam.lewis@bestservedcold.com>
 * @copyright Copyright (c) 2015 Best Served Cold Media Limited
 * @license	  http://http://opensource.org/licenses/GPL-3.0 GPL License
 * @link	  http://bestservedcold.com
 * @since	  0.0.1-alpha
 * @version   0.0.2-alpha

 */
trait DayTrait
{
    use DateTimeTrait;

    /**
     * @return bool
     */
    public function isBeforeToday()
    {
        return $this->isBefore(static::now());
    }

    /**
     * @return bool
     */
    public function isBeforeOrIsToday()
    {
        return $this->isAfterOrIs(static::now());
    }

    /**
     * @return bool
     */
    public function isAfterToday()
    {
        return $this->isAfter(static::now());
    }

    /**
     * @return bool
     */
    public function isAfterOrIsToday()
    {
        return $this->isBeforeOrIs(static::now());
    }

    /**
     * @return static
     */
    public static function tomorrow()
    {
        return static::now()->nextDay();
    }

    /**
     * @return static
     */
    public static function yesterday()
    {
        return static::now()->previousDay();
    }

    /**
     * @return static
     */
    public function nextDay()
    {
        return $this->addDay(1);
    }

    /**
     * @return static
     */
    public function previousDay()
    {
        return $this->addDay(-1);
    }

    /**
     * @return static
     */
    public function addDay($days)
    {
        return static::fromNative($this->native->modify($days . ' day'));
    }

}
