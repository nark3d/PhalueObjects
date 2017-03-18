<?php

namespace BestServedCold\PhalueObjects\Format;

use BestServedCold\PhalueObjects\TestCase;

/**
 * Class XmlTest
 *
 * @package BestServedCold\PhalueObjects\Format
 */
class XmlTest extends TestCase
{
    private $xml = "<note>\n<to>Tove</to>\n<from>Jani</from>\n".
        "<heading>Reminder</heading>\n<body>Don\'t forget me this weekend!</body>\n</note>";

    public function testToArray()
    {
        self::assertTrue(is_array(Xml::fromString($this->xml)->toArray()));
    }
}
