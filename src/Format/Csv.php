<?php

namespace BestServedCold\PhalueObjects\Format;

use BestServedCold\PhalueObjects\Contract\VOArrayable;
use BestServedCold\PhalueObjects\VOArray;
use BestServedCold\PhalueObjects\VOString;

/**
 * Class Csv
 *
 * @package BestServedCold\PhalueObjects\Format
 */
class Csv extends VOString implements VOArrayable
{
    use StringMixin;

    /**
     * @param  array  $array
     * @param  string $delimiter
     * @param  string $enclosure
     * @param  string $escape
     * @return static
     */
    public static function fromArray(
        array $array,
        $delimiter = ',',
        $enclosure = '"',
        $escape = '\\'
    ) {
        return new static(self::hack($array, $delimiter, $enclosure, $escape));
    }

    /**
     * @param  VOArray $voArray
     * @param  string  $delimiter
     * @param  string  $enclosure
     * @param  string  $escape
     * @return static
     */
    public static function fromVOArray(
        VOArray $voArray,
        $delimiter = ',',
        $enclosure = '"',
        $escape = '\\'
    ) {
        return static::fromArray($voArray->getValue(), $delimiter, $enclosure, $escape);
    }

    /**
     * @param  string $delimiter
     * @param  string $enclosure
     * @param  string $escape
     * @return array
     */
    public function toArray($delimiter = ",", $enclosure = '"', $escape = "\\")
    {
        return str_getcsv($this->getValue(), $delimiter, $enclosure, $escape);
    }

    /**
     * Hack
     *
     * PHP does not have a function to convert an array to CSV, however, fputcsv() does.
     * We do this in memory using a file handle.  It's not pretty, but it works.
     *
     * I'm planning on abstracting this out into the File namespace in the near future.
     *
     * @param  array  $array
     * @param  string $delimiter
     * @param  string $enclosure
     * @param  string $escape
     * @return string
     */
    private static function hack(array $array, $delimiter, $enclosure, $escape)
    {
        var_dump($array);
        $handle = fopen('php://temp', 'r+');
        VOArray::fromArray($array)->isMultiDim()
            ? self::hackWrite($handle, $array, $delimiter, $enclosure, $escape)
            : fputcsv($handle, $array, $delimiter, $enclosure, $escape);
        rewind($handle);
        return self::hackRead($handle);
    }

    /**
     * @param $handle
     * @param array $array
     * @param $delimiter
     * @param $enclosure
     * @param $escape
     */
    private static function hackWrite($handle, array $array, $delimiter, $enclosure, $escape)
    {
        foreach ($array as $line) {
            fputcsv($handle, $line, $delimiter, $enclosure, $escape);
        }
    }

    /**
     * @param  $handle
     * @param  string $contents
     * @return string
     */
    private static function hackRead($handle, $contents = '')
    {
        while (!feof($handle)) {
            $contents .= fread($handle, 8192);
        }
        fclose($handle);
        return $contents;
    }
}
