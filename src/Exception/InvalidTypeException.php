<?php

namespace BestServedCold\PhalueObjects\Exception;

use BestServedCold\PhalueObjects\Format\String\Csv;

/**
 * Class InvalidTypeException
 *
 * @package   BestServedCold\PhalueObjects\Exception
 * @author    Adam Lewis <adam.lewis@bestservedcold.com>
 * @copyright Copyright (c) 2015 Best Served Cold Media Limited
 * @license   http://http://opensource.org/licenses/GPL-3.0 GPL License
 * @link      http://bestservedcold.com
 * @since     0.0.1-alpha
 * @version   0.0.2-alpha
 */
class InvalidTypeException extends \InvalidArgumentException
{
    /**
     * @param string $value
     * @param array  $allowedTypes
     */
    public function __construct($value, array $allowedTypes)
    {
        $value = is_array($value) ?: var_export($value, true);
        $this->message =
            '[PhalueObjects] Argument ['.$value.'] of type ['.gettype($value).
            '] is not a valid type.'.' The allowed type(s) are ['.
            Csv::fromArray($allowedTypes)->getValue().']';
    }
}
