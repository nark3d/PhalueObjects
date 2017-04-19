<?php

namespace BestServedCold\PhalueObjects;

use BestServedCold\PhalueObjects\Exception\InvalidTypeException;

/**
 * Class VOStringTest
 *
 * @package BestServedCold\PhalueObjects
 */
class VOStringTest extends TestCase
{
    private $someString = 'this100Is200A Load Of Stuff=!400';

    public function testConstructor()
    {
        self::assertEquals('string', (new VOString('string'))->getValue());
        self::setExpectedException(InvalidTypeException::class);
        try {
            new VOString(['bob']);
//        } catch (\Throwable $exception) {
//            var_dump(get_class($exception));
        } catch (InvalidTypeException $invalid) {
            var_dump(get_class($invalid));
        }
    }

    public function testGetNumbers()
    {
        self::assertEquals(
            '100200400',
            VOString::fromString($this->someString)->getNumbers()
        );
    }

    public function testGetLetters()
    {
        self::assertEquals(
            'thisIsALoadOfStuff',
            VOString::fromString($this->someString)->getLetters()
        );
    }

}
