<?php

namespace BestServedCold\PhalueObjects\VOString;

/**
 * Class StringTrait
 *
 * @package   BestServedCold\PhalueObjects\String
 * @author    Adam Lewis <adam.lewis@bestservedcold.com>
 * @copyright Copyright (c) 2015 Best Served Cold Media Limited
 * @license   http://http://opensource.org/licenses/GPL-3.0 GPL License
 * @link      http://bestservedcold.com
 * @since     0.0.1-alpha
 * @version   0.0.2-alpha
 */
trait StringTrait
{
    /**
     * @param  Integer $spaces
     * @return string
     */
    public function integerToSpace($spaces)
    {
        return str_pad('', $spaces->getValue());
    }
}
