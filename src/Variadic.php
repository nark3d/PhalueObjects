<?php

namespace BestServedCold\PhalueObjects;

/**
 * Class Variadic
 *
 * @package BestServedCold\PhalueObjects\ValueObject
 */
class Variadic extends VOArray
{
    /**
     * Variadic constructor.
     *
     * @param array ...$arguments
     */
    public function __construct(...$arguments)
    {
        parent::__construct($arguments);
    }
}
