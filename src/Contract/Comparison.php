<?php namespace BestServedCold\PhalueObjects\Contract;

interface Comparison
{
    public function isGreater(self $comparison);

    public function isGreaterOrEqual(self $comparison);

    public function isLess(self $comparison);

    public function isLessOrEqual(self $comparison);
}