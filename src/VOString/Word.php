<?php

namespace BestServedCold\PhalueObjects\VOString;

use BestServedCold\PhalueObjects\Exception\InvalidTypeException;
use BestServedCold\PhalueObjects\VOString;
use Doctrine\Common\Inflector\Inflector;

/**
 * Class Word
 *
 * @package BestServedCold\PhalueObjects\VOString
 */
class Word extends VOString
{
    /**
     * Word constructor.
     *
     * @param $value
     */
    public function __construct($value)
    {
        parent::__construct($value);

        if (! preg_match('/[A-za-z]/', $this->getValue())) {
            throw new InvalidTypeException($value, ['word']);
        }
    }

    /**
     * @param  integer $count
     * @return string
     */
    public function getPluralised($count = null)
    {
        return $count === null || $count > 1 ? Inflector::pluralize($this->getValue()) : $this->getValue();
    }
}
