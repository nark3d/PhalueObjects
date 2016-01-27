<?php namespace BestServedCold\PhalueObjects\File\Http;

use BestServedCold\PhalueObjects\File\Http;

final class Xml extends Http
{
    public function toArray()
    {
        return Xml::toArray($this->getContents());
    }
}
