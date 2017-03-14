<?php

namespace BestServedCold\PhalueObjects\Exception;

use BestServedCold\PhalueObjects\Mathematical\Integer;

/**
 * Class InvalidRangeTypeException
 *
 * @package BestServedCold\PhalueObjects\Exception
 * @author    Adam Lewis <adam.lewis@bestservedcold.com>
 * @copyright Copyright (c) 2015 Best Served Cold Media Limited
 * @license      http://http://opensource.org/licenses/GPL-3.0 GPL License
 * @link      http://bestservedcold.com
 * @since      0.0.1-alpha
 * @version   0.0.2-alpha
 */
class InvalidRangeTypeException extends InvalidTypeException
{
    /**
     * @var int
     */
    protected $minimum;

    /**
     * @var int
     */
    protected $maximum;

    /**
     * @param string $value
     * @param string[] $allowedTypes
     * @param integer $minimum
     * @param integer $maximum
     */
    public function __construct($value, $allowedTypes, $minimum, $maximum)
    {
        $this->minimum = $minimum;
        $this->maximum = $maximum;
        parent::__construct($value, $allowedTypes);
    }

    /**
     * @param  $allowedTypes
     * @return string
     */
    protected function getAllowedTypes($allowedTypes)
    {
        $string = [ ];
        foreach ($allowedTypes as $type) {
            $string[ ] = '('.$type.' >= '.$this->minimum.', '.$type.
                ' <= '.$this->maximum.')';
        }

        return $this->arrayToCommaString($string, new Integer(1));
    }
}
