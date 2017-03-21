<?php

namespace BestServedCold\PhalueObjects\Request\Curl;

use BestServedCold\PhalueObjects\Request\Curl;

/**
 * Class Url
 *
 * @package BestServedCold\PhalueObjects\Request\Curl
 */
class Url extends Curl
{
    /**
     * @var array $options
     */
    protected static $options = [
        CURLOPT_BINARYTRANSFER => true,
        CURLOPT_RETURNTRANSFER => true
    ];
}
