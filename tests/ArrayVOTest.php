<?php

namespace BestServedCold\PhalueObjects;

use BestServedCold\PhalueObjects\Exception\InvalidTypeException;
use BestServedCold\PhalueObjects\Format\Json\Notation;
use BestServedCold\PhalueObjects\Metric\PeakMemoryUsage;
use BestServedCold\PhalueObjects\TestCase;

class ArrayVOTest extends TestCase
{
    private $ArrayVO;
    private $testArray = ['bob' => 'mary', 'susan' => 'barry', 'michael' => ['george' => 'somink']];

    public function setUp()
    {
        $this->ArrayVO = new ArrayVO($this->testArray);
    }

    public function testToString()
    {
        self::assertEquals(
            'a:2:{i:0;s:4:"mary";i:1;s:3:"bob";}',
            (string) new ArrayVO(['mary', 'bob'])
        );
    }

    public function testDropFirst()
    {
        self::assertEquals(
            [ 'susan' => 'barry', 'michael' => ['george' => 'somink']],
            ArrayVO::fromArray($this->testArray)->dropFirst()->getValue()
        );
    }

    public function testDropLast()
    {
        self::assertEquals(
            ['bob' => 'mary', 'susan' => 'barry'],
            ArrayVO::fromArray($this->testArray)->dropLast()->getValue()
        );
    }

    public function testEquals()
    {
        self::assertTrue($this->ArrayVO->equals(new ArrayVO($this->testArray)));
        self::assertFalse($this->ArrayVO->equals(new ArrayVO([13, 22, 35, 33])));
    }

    public function testEqualsException()
    {
        $this->setExpectedException(InvalidTypeException::class);
        (new ArrayVO(['some', 'array']))->equals(PeakMemoryUsage::now());
    }
    public function testGetValues()
    {
        self::assertEquals($this->testArray, $this->ArrayVO->getValue());
        self::assertNotEquals([23423, 34, 5], $this->ArrayVO->getValue());
    }

    public function testJsonNotation()
    {
        $array = ['bob' => ['susan' => ['mary' => 'findMe']]];
        self::assertEquals(
            'findMe',
            (new ArrayVO($array))
                ->findJsonNotation(Notation::fromString('bob.susan.mary'))
        );

        self::assertFalse(
            (new ArrayVO($array))
                ->findJsonNotation(Notation::fromString('bob.susan.barry'))
        );
    }

    public function testFindFromArray()
    {
        $array = ['bob' => ['susan' => ['mary' => 'findMe']]];
        self::assertEquals(
            'findMe',
            (new ArrayVO($array))
                ->findArray(['bob', 'susan', 'mary'])
        );

        self::assertFalse(
            (new ArrayVO($array))
                ->findArray(['bob', 'no', 'way', 'hosai'])
        );
    }
    public function testIsEmpty()
    {
        self::assertTrue((new ArrayVO([]))->isEmpty());
    }

    public function testRewind()
    {
        self::assertInstanceOf(ArrayVO::class, (new ArrayVO(['bob', 'mary']))->rewind());
    }

    public function testNext()
    {
        $arrayVO = new ArrayVO(['bob', 'mary', 'susan']);
        $next = $arrayVO->next();
        self::assertInstanceOf(ArrayVO::class, $next);
        self::assertEquals('mary', $next->current());
    }

    public function testValid()
    {
        $arrayVO = new ArrayVO(['bob', 'mary']);
        $inValid = $arrayVO->next()->next();
        self::assertFalse($inValid->valid());
    }

    public function testGetFirstKey()
    {
        $array = ['bob' => 'mary', 'susan' => 'barry', 'michael' => 'george'];
        self::assertEquals(
            'bob',
            (new ArrayVO($array))->getFirstKey()
        );
    }

    public function testGetLastKey()
    {
        $array = ['bob' => 'mary', 'susan' => 'barry', 'michael' => 'george'];
        self::assertEquals(
            'michael',
            (new ArrayVO($array))->getLastKey()
        );
    }
}
