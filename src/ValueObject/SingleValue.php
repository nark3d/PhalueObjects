<?php

namespace BestServedCold\PhalueObjects\ValueObject;

use BestServedCold\PhalueObjects\ValueObject;

/**
 * Class SingleValue
 *
 * @package   BestServedCold\PhalueObjects\ValueObject
 * @author    Adam Lewis <adam.lewis@bestservedcold.com>
 * @copyright Copyright (c) 2015 Best Served Cold Media Limited
 * @license	  http://http://opensource.org/licenses/GPL-3.0 GPL License
 * @link	  http://bestservedcold.com
 * @since	  0.0.1-alpha
 * @version   0.0.2-alpha
 */
abstract class SingleValue extends ValueObject
{
    /**
     * @var mixed
     */
    protected $value;

    /**
     * Class Constructor.
     *
     * @param $value
     */
    public function __construct($value)
    {
        $this->value = $value;
        parent::__construct();
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->value;
    }

    /**
     * @param  SingleValue $object
     * @return bool
     */
    public function equals(SingleValue $object)
    {
        return $this->value === $object->value;
    }
}
