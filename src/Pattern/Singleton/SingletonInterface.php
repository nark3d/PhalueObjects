<?php namespace BestServedCold\PhalueObjects\Pattern\Singleton;

interface SingletonInterface
{
    /**
     * Get Singleton instance.
     *
     * @return object
     */
    public static function getInstance();
}
