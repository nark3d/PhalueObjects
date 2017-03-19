<?php

namespace BestServedCold\PhalueObjects\VOArray;

use BestServedCold\PhalueObjects\TestCase;
use BestServedCold\PhalueObjects\VOArray;

/**
 * Class PointerTest
 *
 * @package BestServedCold\PhalueObjects\VOArray
 */
class PointerTest extends TestCase
{
    private $voArray;

    public function setUp()
    {
        $this->voArray = new VOArray(['test', 'this', 'mother']);
        parent::setUp();
    }

    public function testIsFirst()
    {
        $this->voArray->rewind();
        self::assertTrue($this->voArray->isFirst());
    }

    public function testIsLast()
    {
        $this->voArray->end();
        self::assertTrue($this->voArray->isLast());
    }
}
