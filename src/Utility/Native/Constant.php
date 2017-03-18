<?php namespace BestServedCold\PhalueObjects\Utility\Native;

/**
 * Class Constants
 * @package BestServedCold\PhalueObjects\Utility\Native
 */
class Constant
{
    /**
     * @var array
     */
    private $definedConstants;

    /**
     * Constants constructor.
     */
    public function __construct()
    {
        $this->definedConstants = get_defined_constants(true);
    }

    /**
     * @param $category
     * @param array $key
     * @return mixed
     */
    public function __call($category, array $key)
    {
        $category = $this->definedConstants[ $category ];
        return empty($key) ? $category : array_search(reset($key), $category);
    }

    /**
     * @return static
     */
    public static function init()
    {
        return new static;
    }
}
