<?php

namespace BestServedCold\PhalueObjects\ExtendedArray;

use BestServedCold\PhalueObjects\String\StringTrait;

/**
 * Class ExtendedArrayTrait
 *
 * @package   BestServedCold\PhalueObjects\ExtendedArray
 * @author    Adam Lewis <adam.lewis@bestservedcold.com>
 * @copyright Copyright (c) 2015 Best Served Cold Media Limited
 * @license      http://http://opensource.org/licenses/GPL-3.0 GPL License
 * @link      http://bestservedcold.com
 * @since      0.0.1-alpha
 * @version   0.0.8-alpha
 */
trait ExtendedArrayTrait
{
    use StringTrait;

    /**
     * @param  array $array
     * @param  Integer $spaces
     * @return string
     */
    public function arrayToCommaString(array $array, $spaces)
    {
        return implode(",{$this->integerToSpace($spaces)}", $array);
    }

    /**
     * @param  array  $array
     * @return string
     */
    public function arrayToPairString(array $array)
    {
        return implode(',', array_map(function ($key, $value) {
            return $key . '=' . $value;
        }, array_keys($array), $array));
    }

    /**
     * @param  array $array
     * @return array
     */
    public function arrayToAttributeArray(array $array)
    {
        return implode(' ', array_map(function($key, $value) {
            return is_null($value) ? $key : $key . '="' . $value . '"';
        }, array_keys($array), $array));
    }

    /**
     * @param  $json
     * @return array
     */
    public static function getArrayUsingJsonNotation($json)
    {
        return explode('.', $json);
    }

    /**
     * Get an item from an array using "dot" notation.
     *
     * @param array  $array
     * @param string $key
     * @param mixed  $default
     *
     * @return mixed
     */
    public static function getFromArrayUsingJsonNotation(
        $array,
        $key = null,
        $default = null
    ) {
        if (is_null($key)) {
            return $array;
        }

        if (isset($array[ $key ])) {
            return $array[ $key ];
        }

        foreach (self::getArrayUsingJsonNotation($key) as $segment) {
            if (!is_array($array) || !array_key_exists($segment, $array)) {
                return $default;
            }
            $array = $array[ $segment ];
        }

        return $array;
    }

    /**
     * @param array $array
     * @param bool|false $key
     * @return null
     */
    public static function nullIfNotSet(array $array, $key = false)
    {
        return isset($array[$key]) ? $array[$key] : null;
    }

    /**
     * @param array $array
     * @param bool|false $key
     * @return bool
     */
    public static function falseIfNotSet(array $array, $key = false)
    {
        return isset($array[$key]) ? $array[$key] : false;
    }
}
