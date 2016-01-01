<?php namespace BestServedCold\PhalueObjects\File;

use BestServedCold\PhalueObjects\File;

final class Xml extends File
{
    public function parse()
    {
        return $this->xmlJsonFix(simplexml_load_string($this->getContents(), 'SimpleXMLElement', LIBXML_NOCDATA));
    }

    private function xmlJsonFix($xml)
    {
        return json_decode(str_replace(':[]', ':null', str_replace(':{}', ':null', json_encode((array) $xml))), 1);
    }
}
