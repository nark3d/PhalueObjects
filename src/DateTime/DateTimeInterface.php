<?php

namespace BestServedCold\PhalueObjects\DateTime;

use BestServedCold\PhalueObjects\ValueObjectInterface;

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
}
