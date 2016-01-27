<?php

namespace BestServedCold\PhalueObjects\Format;

use BestServedCold\PhalueObjects\Format;

final class Xml extends Format
{
    public function parse()
    {
        return $this->xmlJsonFix(
            simplexml_load_string(
                $this->getValue(),
                'SimpleXMLElement',
                LIBXML_NOCDATA
            )
        );
    }

    private function xmlJsonFix($xml)
    {
        return json_decode(
            str_replace(
                ':[]',
                ':null',
                str_replace(
                    ':{}',
                    ':null',
                    json_encode((array) $xml)
                )
            ),
            1
        );
    }
}
