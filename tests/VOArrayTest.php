<?php

namespace BestServedCold\PhalueObjects;

use BestServedCold\PhalueObjects\Exception\InvalidTypeException;
use BestServedCold\PhalueObjects\Format\Json\Notation;
use BestServedCold\PhalueObjects\Metric\PeakMemoryUsage;
use BestServedCold\PhalueObjects\TestCase;

class VOArrayTest extends TestCase
{
    private $VOArray;
    private $testArray = ['bob' => 'mary', 'susan' => 'barry', 'michael' => ['george' => 'somink']];

    public function setUp()
    {
        $this->VOArray = new VOArray($this->testArray);
    }

    public function testToString()
    {
        self::assertEquals(
            'a:2:{i:0;s:4:"mary";i:1;s:3:"bob";}',
            (string) new VOArray(['mary', 'bob'])
        );
    }

    public function testDropFirst()
    {
        self::assertEquals(
            [ 'susan' => 'barry', 'michael' => ['george' => 'somink']],
            VOArray::fromArray($this->testArray)->dropFirst()->getValue()
        );
    }

    public function testDropLast()
    {
        self::assertEquals(
            ['bob' => 'mary', 'susan' => 'barry'],
            VOArray::fromArray($this->testArray)->dropLast()->getValue()
        );
    }

    public function testEquals()
    {
        self::assertTrue($this->VOArray->equals(new VOArray($this->testArray)));
        self::assertFalse($this->VOArray->equals(new VOArray([13, 22, 35, 33])));
    }
    
    public function testGetValues()
    {
        self::assertEquals($this->testArray, $this->VOArray->getValue());
        self::assertNotEquals([23423, 34, 5], $this->VOArray->getValue());
    }

    public function testIsEmpty()
    {
        self::assertTrue((new VOArray([]))->isEmpty());
    }

    public function testRewind()
    {
        self::assertInstanceOf(VOArray::class, (new VOArray(['bob', 'mary']))->rewind());
    }

    public function testNext()
    {
        $VOArray = new VOArray(['bob', 'mary', 'susan']);
        $next = $VOArray->next();
        self::assertInstanceOf(VOArray::class, $next);
        self::assertEquals('mary', $next->current());
    }

    public function testValid()
    {
        $VOArray = new VOArray(['bob', 'mary']);
        $inValid = $VOArray->next()->next();
        self::assertFalse($inValid->valid());
    }

    public function testToArray()
    {
        $voArray = new VOArray(['bob', 'mary']);
        self::assertTrue(is_array($voArray->getValue()));
        self::assertEquals(
            ['bob', 'mary'],
            $voArray->toArray()
        );

    }
}
