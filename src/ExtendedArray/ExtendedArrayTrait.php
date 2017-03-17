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
     * @param  array  $array
     * @return string
     */
    public function arrayToPairString(array $array)
    {
        return implode(',', array_map(function ($key, $value) {
            return $key.'='.$value;
        }, array_keys($array), $array));
    }

    /**
     * @param  array $array
     * @return string
     */
    public function arrayToAttributeArray(array $array)
    {
        return implode(' ', array_map(function ($key, $value) {
            return is_null($value) ? $key : $key.'="'.$value.'"';
        }, array_keys($array), $array));
    }
}
