<?php namespace PhalueObjects\DateTime;

interface DateTimeInterface
{
    public static function now();

    /**
     * @return void
     */
    public static function fromString();

    public function equals();
}