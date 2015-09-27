<?php namespace BestServedCold\PhalueObjects\DateTime;

interface DateTimeInterface
{
    /**
     * Now
     *
     * @return static
     */
    public static function now();

    /**
     * From String
     *
     * @param  $string
     * @return static
     */
    public static function fromString($string);
}
