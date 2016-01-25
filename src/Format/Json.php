<?php namespace BestServedCold\PhalueObjects\File;

use phpDocumentor\Plugin\Scrybe\Converter\Format\Format;

final class Json extends Format
{
    public function parse()
    {
        return json_decode($this->getValue());
    }
}
