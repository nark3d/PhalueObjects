<?php

namespace BestServedCold\PhalueObjects\Format\Float;

use BestServedCold\PhalueObjects\Contract\VOStringable;
use BestServedCold\PhalueObjects\VOArray\Find;
use BestServedCold\PhalueObjects\VOArray\Map;
use BestServedCold\PhalueObjects\VOClosure\Value;
use BestServedCold\PhalueObjects\VOFloat;
use BestServedCold\PhalueObjects\VOString;
use BestServedCold\PhalueObjects\VOString\Word;
use BestServedCold\PhalueObjects\VOString\Mixin as VOStringTrait;

/**
 * Class Byte
 *
 * @package BestServedCold\PhalueObjects\Format
 */
abstract class Byte extends VOFloat implements VOStringable
{
    use VOStringTrait;

    const UNITS = [
        [ 'Byte' => 'Byte' ],
        [ 'KB'   => 'Kilobyte' ],
        [ 'MB'   => 'Megabyte' ],
        [ 'GB'   => 'Gigabyte' ],
        [ 'TB'   => 'Terabyte' ],
        [ 'PB'   => 'Pecabyte' ],
        [ 'EB'   => 'Exabyte' ],
        [ 'ZB'   => 'Zettabyte' ],
        [ 'YB'   => 'Yottabyte' ]
    ];

    /**
     * @var integer $power
     */
    protected static $power;

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->toString();
    }

    /**
     * @param  string $string
     * @return static
     */
    public static function fromString($string)
    {
        $voString = VOString::fromString($string);

        return new static(
            $voString->getNumbers() *
            pow(
                static::$power,
                Find::fromArray(self::getUnitKeyList())->keyFromArrayValue($voString->getLetters())
            )
        );
    }

    /**
     * @return string
     */
    public function toString()
    {
        return $this->getValue() ? $this->getPower().' '.$this->getUnit() : '0 Bytes';
    }

    /**
     * @param  null   $power
     * @return string
     */
    public function getUnit($power = null)
    {
        $power = $power ?: $this->getPower();
        $unit  = self::UNITS[ (int) floor($this->base()) ];
        return Word::fromString(reset($unit))->getPluralised($power);
    }

    /**
     * @param  int $precision
     * @return float
     */
    public function getPower($precision = 2)
    {
        return round(pow(static::$power, $this->base() - floor($this->base())), $precision);
    }

    /**
     * @return float
     */
    private function base()
    {
        return log($this->getValue(), static::$power);
    }

    /**
     * @return mixed
     */
    private static function getUnitKeyList()
    {
        return Map::fromVariadic(Value::toArrayWithPlural(true), self::UNITS)->getValue();
    }
}
