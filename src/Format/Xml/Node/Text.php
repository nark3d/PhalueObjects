<?php

namespace BestServedCold\PhalueObjects\Format\Xml\Node;

class Text implements NodeInterface
{

    public static function run($node)
    {
        return trim($node->textContent);
    }
}
