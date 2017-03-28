<?php

namespace BestServedCold\PhalueObjects\Mathematical;

use BestServedCold\PhalueObjects\Mathematical;

/**
 * Class ZeroPaddedInteger
 *
 * @package   BestServedCold\PhalueObjects\Mathematical
 * @author    Adam Lewis <adam.lewis@bestservedcold.com>
 * @copyright Copyright (c) 2015 Best Served Cold Media Limited
 * @license   http://http://opensource.org/licenses/GPL-3.0 GPL License
 * @link      http://bestservedcold.com
 * @since     0.0.1-alpha
 * @version   0.0.2-alpha
 */
class ZeroPaddedInteger extends Mathematical
{
    /**
     * @param $value
     * @param int    $leading
     */
    public function __construct($value, $leading = 2)
    {
        parent::__construct(
            str_pad(
                $value,
                strlen((string) $value) + $leading,
                "0",
                STR_PAD_LEFT)
        );
    }
}
