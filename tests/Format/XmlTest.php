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
    private $xml = '<?xml version="1.0"?>' . PHP_EOL . '<note>' . PHP_EOL . ' <to>Tove</to>' . PHP_EOL .
        ' <from>Jani</from>'. PHP_EOL . ' <heading>Reminder</heading>' . PHP_EOL .
        ' <body>Don\'t forget me this weekend!</body>' . PHP_EOL . '</note>' . PHP_EOL;

    private $array = [
        'note' => [
            'to'      => 'Tove',
            'from'    => 'Jani',
            'heading' => 'Reminder',
            'body'    => 'Don\'t forget me this weekend!'
        ]
    ];

    public function testToArray()
    {
        self::assertTrue(is_array(Xml::fromString($this->xml)->toArray()));
    }

    public function testFromArray()
    {
        self::assertEquals($this->xml, Xml::fromArray($this->array, 'note')->getValue());
        self::setExpectedException(\InvalidArgumentException::class);
        Xml::fromArray(['two' => 'elements', 'array' => ['this' => 'has']]);
    }
}
