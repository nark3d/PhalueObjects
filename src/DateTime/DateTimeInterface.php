<?php namespace PhalueObjects\DateTime;

interface DateTimeInterface
{
    public static function now();

    public static function fromString($string);

    public function equals();
}