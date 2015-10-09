<?php

namespace BestServedCold\PhalueObjects\DateTime\Unit;

use BestServedCold\PhalueObjects\DateTime\DateTimeInterface;
use BestServedCold\PhalueObjects\DateTime\DateTimeTrait;
use BestServedCold\PhalueObjects\Mathematical\Integer;

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
