<?php namespace BestServedCold\PhalueObjects\Mathematical\Integer;

use BestServedCold\PhalueObjects\Mathematical\Integer;

trait IntegerTrait
{
    public function inRange(Integer $int, $min, $max)
    {
        return filter_var(
            $int->getValue(),
            FILTER_VALIDATE_INT,
            [
                'options' => [
                    'min_range' => $min,
                    'max_range' => $max
                ]
            ]
        );
    }
}
