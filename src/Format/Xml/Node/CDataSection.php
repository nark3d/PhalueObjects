<?php

namespace BestServedCold\PhalueObjects\Format\Xml\Node;

class CDataSection implements NodeInterface
{
    private $key = '@cdata';
    
    public static function run($node)
    {
        return trim($node->textContent);
    }

    public function getKey()
    {
        return $this->key;
    }
}
