<?php namespace BestServedCold\PhalueObjects\Colour;

use BestServedCold\PhalueObjects\ValueObject;

class Hex extends ValueObject
{
    public function toRbg()
    {
        $hex = str_replace("#", "", $this->value);

        if(strlen($hex) == 3) {
            $r = hexdec($hex[0].$hex[0]);
            $g = hexdec($hex[1].$hex[1]);
            $b = hexdec($hex[2].$hex[2]);
        } else {
            $r = hexdec($hex[0].$hex[1]);
            $g = hexdec($hex[2].$hex[3]);
            $b = hexdec($hex[4].$hex[5]);
        }

        return new Rgb(array($r, $g, $b));
    }
}
