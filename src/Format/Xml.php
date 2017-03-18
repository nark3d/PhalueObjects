<?php

namespace BestServedCold\PhalueObjects\Format;

use BestServedCold\PhalueObjects\Format;
use Sabre\Xml\Service;

/**
 * Class Xml
 * @package BestServedCold\PhalueObjects\Format
 */
class Xml extends Format
{
    /**
     * @return array
     */
    public function toArray()
    {
        return (array) (new Service())->parse($this->getValue());
    }
}
