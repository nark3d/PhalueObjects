<?php namespace BestServedCold\PhalueObjects\Pattern;

abstract class UnConstructable
{
    /**
     * Prevent instance from being cloned.
     */
    private function __clone() {}

    /**
     * Prevent instance from being unserialised.
     */
    private function __wakeup() {}
}
