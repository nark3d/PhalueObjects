<?php

namespace BestServedCold\PhalueObjects\Contract;

/**
 * Interface AutoDependency
 *
 * @package BestServedCold\PhalueObjects\Contract
 */
interface AutoDependency
{
    /**
     * @param  $options
     * @return mixed
     */
    public static function auto(array $options = []);
}
