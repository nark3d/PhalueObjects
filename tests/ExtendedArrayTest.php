<?php namespace BestServedCold\PhalueObjects;

class ExtendedArrayTest extends TestCase
{
    public function testConstructor()
    {
        $array = [
            'harry' => 'sue',
            'bob' => 'margaret',
            'susan' => [
                'bill' => 'mary'
            ]
        ];
        $extendedArray = new ExtendedArray($array);

        $this->assertSame($array, $extendedArray->getValue());
        $this->setExpectedException(
        'BestServedCold\PhalueObjects\Exception\InvalidTypeException'
        );
        new ExtendedArray('this is the wrong type');
    }
}
