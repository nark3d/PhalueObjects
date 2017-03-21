<?php

namespace BestServedCold\PhalueObjects\Contract;

/**
 * Interface Request
 *
 * @package BestServedCold\PhalueObjects\Contract
 */
interface Request
{
    /**
     * @return mixed
     */
    public function getContents();

    /**
     * @return mixed
     */
    public function getInfo();
}
