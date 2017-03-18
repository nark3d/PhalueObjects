<?php

namespace BestServedCold\PhalueObjects;

use BestServedCold\PhalueObjects\Exception\InvalidTypeException;
use BestServedCold\PhalueObjects\Format\Byte\Binary;
use stdClass;

/**
 * Class VOObjectTest
 *
 * @package BestServedCold\PhalueObjects
 */
class VOObjectTest extends TestCase
{
    public function testConstructor()
    {
        $voObject = new VOObject(new stdClass);
        self::assertTrue(is_object($voObject->getValue()));
        self::setExpectedException(InvalidTypeException::class);
        new VOObject('string');
    }

    public function testGetShortName()
    {
        $voObject = new VOObject(new Binary(1000));
        self::assertEquals(
            'Binary',
            $voObject->getShortName()
        );
    }
}
