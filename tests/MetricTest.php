<?php

namespace BestServedCold\PhalueObjects;

class MetricTest extends TestCase
{
    public function testToString()
    {
        self::assertEquals(
            'string,anotherString',
            (string) $this->getMockForAbstractClass (
                Metric::class,
                [['string', 'anotherString']]
            )
        );
    }
}
