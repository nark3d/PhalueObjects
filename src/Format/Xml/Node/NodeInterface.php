<?php

namespace BestServedCold\PhalueObjects\Format\Xml\Node;

interface NodeInterface
{
    /**
     * @param  $node
     * @return mixed
     */
    public static function run($node);
}
