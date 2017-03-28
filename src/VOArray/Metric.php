<?php

namespace BestServedCold\PhalueObjects\VOArray;

use BestServedCold\PhalueObjects\VOArray;
use BestServedCold\PhalueObjects\Exception\InvalidTypeException;
use BestServedCold\PhalueObjects\Contract\ValueObject;

/**
 * Trait Metric
 */
trait Metric
{
    /**
     * @return int
     */
    public function count()
    {
        return count($this->getValue());
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return empty($this->value);
    }

    /**
     * @return boolean
     */
    public function isMultiDim()
    {
        return count($this->getValue()) !== count($this->getValue(), COUNT_RECURSIVE);
    }

    public function getDepth()
    {
        $max = 0;
        $depth = function (&$max) {
            return function($line) use (&$max) {
                // every line-indent equals 4 spaces
                $max = max([$max, (strlen($line) - strlen(ltrim($line))) / 4]);
            };
        };

        // print_r returns formatted textual array presentation
        array_map($depth($max), explode(PHP_EOL, print_r($this->getValue(), true)));
        // [1,2] -> 1, [3,4] -> 2, ..., [N,N+1] -> (N+1)/2
        return ceil(($max - 1) / 2) + 1;
    }


}
