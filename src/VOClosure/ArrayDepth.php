<?php

namespace BestServedCold\PhalueObjects\VOClosure;

use BestServedCold\PhalueObjects\VOClosure;

/**
 * Class Depth
 *
 * @package BestServedCold\PhalueObjects\VOClosure
 */
class ArrayDepth extends VOClosure
{
    /**
     * @return static
     */
    public static function toDepth()
    {
        return new static(
            function (&$max) {
                return function ($line) use (&$max) {
                    // every line-indent equals 4 spaces
                    $max = max([$max, (strlen($line) - strlen(ltrim($line))) / 4]);
                };
            }
        );
    }
}
