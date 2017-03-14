<?php namespace BestServedCold\PhalueObjects\Colour;

use BestServedCold\PhalueObjects\ValueObject;

/**
 * Class Hex
 *
 * @package BestServedCold\PhalueObjects\Colour
 */
class Hex extends ValueObject
{
    /**
     * @return Rgb
     */
    public function toRbg()
    {
        $hex = str_replace("#", "", $this->value);

        if (strlen($hex) == 3) {
            $red   = hexdec($hex[0].$hex[0]);
            $green = hexdec($hex[1].$hex[1]);
            $blue  = hexdec($hex[2].$hex[2]);
        } else {
            $red   = hexdec($hex[0].$hex[1]);
            $green = hexdec($hex[2].$hex[3]);
            $blue = hexdec($hex[4].$hex[5]);
        }

        return new Rgb([$red, $green, $blue]);
    }
}
