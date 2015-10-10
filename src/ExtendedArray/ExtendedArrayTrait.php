<?php

namespace BestServedCold\PhalueObjects\ExtendedArray;

use BestServedCold\PhalueObjects\Mathematical\Integer;
use BestServedCold\PhalueObjects\String\StringTrait;

/**
 * Class ExtendedArrayTrait
 *
 * @package   BestServedCold\PhalueObjects\ExtendedArray
 * @author    Adam Lewis <adam.lewis@bestservedcold.com>
 * @copyright Copyright (c) 2015 Best Served Cold Media Limited
 * @license	  http://http://opensource.org/licenses/GPL-3.0 GPL License
 * @link	  http://bestservedcold.com
 * @since	  0.0.1-alpha
 * @version   0.0.2-alpha
 */
trait ExtendedArrayTrait
{
    use StringTrait;

    /**
     * @param  array $array
     * @param  Integer $spaces
     * @return string
     */
    public function arrayToCommaString(array $array, Integer $spaces)
    {
        return implode(",{$this->integerToSpace($spaces)}", $array);
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
    public static function getFromArrayUsingJsonNotation($array, $key = null, $default = null)
    {
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
}
