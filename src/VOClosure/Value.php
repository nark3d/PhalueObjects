<?php

namespace BestServedCold\PhalueObjects\VOClosure;

use BestServedCold\PhalueObjects\VOClosure;
use BestServedCold\PhalueObjects\VOString\Word;

/**
 * Class Value
 *
 * @package BestServedCold\PhalueObjects\VOClosure
 */
class Value extends VOClosure
{
    /**
     * @param  bool   $pluralValue
     * @param  bool   $pluralKey
     * @return static
     */
    public static function toArrayWithPlural($pluralValue = false, $pluralKey = false)
    {
        return new static(
            function ($value) use ($pluralValue, $pluralKey) {
                return array_filter([
                    key($value),
                    reset($value),
                    $pluralKey ? Word::fromString(key($value))->getPluralised() : null,
                    $pluralValue ? Word::fromString(reset($value))->getPluralised() : null
                ]);
            }
        );
    }
}
