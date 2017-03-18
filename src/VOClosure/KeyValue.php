<?php

namespace BestServedCold\PhalueObjects\VOClosure;

use BestServedCold\PhalueObjects\VOClosure;

/**
 * Class KeyValue
 *
 * @package BestServedCold\PhalueObjects\VOClosure
 */
class KeyValue extends VOClosure
{
    /**
     * @param  null|string $prefix
     * @param  null|string $glue
     * @param  null|string $suffix
     * @return static
     */
    public static function fromVars($prefix = null, $glue = null, $suffix = null)
    {
        return new static(
            function ($key, $value) use ($prefix, $glue, $suffix) {
                return $prefix . $key . $glue . $value . $suffix;
            }
        );
    }
}
