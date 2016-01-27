<?php

namespace BestServedCold\PhalueObjects\Format;

use BestServedCold\PhalueObjects\Format;

final class Xml extends Format
{
    public function parse()
    {
        return (array) $this->objectify($this->getValue());
    }

    private function getXml($value)
    {
        return is_string($value)
            ? simplexml_load_string($value, 'SimpleXMLElement', LIBXML_NOCDATA)
            : $value;
    }

    
    private function objectify($value)
    {
        $temp = $this->getXml($value);

        $result = [];

        foreach ((array) $temp as $key => $value) {
            $result[$key] = (is_array($value) || is_object($value))
                ? $this->objectify($value)
                : $value;
        }

        return $result;
    }
}
