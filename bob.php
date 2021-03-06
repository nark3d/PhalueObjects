<?php

require_once('./vendor/autoload.php');

use BestServedCold\PhalueObjects\Format\Byte\Binary;
use BestServedCold\PhalueObjects\Format\Byte\Decimal;

var_dump(Binary::fromString('100 MB')->getValue());
var_dump(Decimal::fromString('100 MB')->getValue());
var_dump(Binary::fromFloat(123456)->toString());
var_dump((string) Binary::fromFloat(1.208925819614629e24));

use BestServedCold\PhalueObjects\Format\Csv;

var_dump(Csv::fromArray([['some', 'text'], ['in', 'a'],['multi-dimensional', 'array']])->getValue());
var_dump(Csv::fromArray(['test', 'a', 'thing'])->getValue());
