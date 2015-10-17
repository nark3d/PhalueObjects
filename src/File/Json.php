<?php namespace BestServedCold\PhalueObjects;

final class Json extends File
{
    public function parse()
    {
        return json_decode($this->getContents());
    }
}
