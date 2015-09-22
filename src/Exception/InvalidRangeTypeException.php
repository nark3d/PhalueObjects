<?php namespace BestServedCold\PhalueObjects\Exception;

use BestServedCold\PhalueObjects\Mathematical\Integer;

class InvalidRangeTypeException extends InvalidTypeException
{
    protected $minimum;
    protected $maximum;

    public function __construct($value, $allowedTypes, $minimum, $maximum)
    {
        $this->minimum = $minimum;
        $this->maximum = $maximum;
        parent::__construct($value, $allowedTypes);
    }

    protected function getAllowedTypes($allowedTypes)
    {
        $string = [ ];
        foreach ($allowedTypes as $type) {
            $string[ ] = '(' . $type . ' >= ' . $this->minimum . ', ' . $type .
                ' <= ' . $this->maximum . ')';
        }
        return $this->arrayToCommaString($string, new Integer(1));
    }
}

