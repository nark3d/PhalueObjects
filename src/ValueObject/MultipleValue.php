<?php

namespace BestServedCold\PhalueObjects\ValueObject;

use BestServedCold\PhalueObjects\ValueObject;

/**
 * Class MultipleValue
 *
 * @package   BestServedCold\PhalueObjects\ValueObject
 * @author    Adam Lewis <adam.lewis@bestservedcold.com>
 * @copyright Copyright (c) 2015 Best Served Cold Media Limited
 * @license	  http://http://opensource.org/licenses/GPL-3.0 GPL License
 * @link	  http://bestservedcold.com
 * @since	  0.0.1-alpha
 * @version   0.0.2-alpha
 */
abstract class MultipleValue extends ValueObject
{
    /**
     * @var array
     */
    protected $arguments;

    /**
     * @param array $arguments
     */
    public function __construct(array $arguments)
    {
        $this->arguments = $arguments;
        parent::__construct();
    }

    /**
     * @return array
     */
    public function getValues()
    {
        return $this->arguments;
    }

    /**
     * @param  MultipleValue $object
     * @return bool
     */
    public function equals(MultipleValue $object)
    {
        return serialize($this->getValues()) === serialize($object->getValues());
    }
}
