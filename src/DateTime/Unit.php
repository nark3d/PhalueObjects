<?php namespace PhalueObjects\DateTime;

use PhalueObjects\AbstractObject\SingleValueObject;
use Carbon\Carbon;


abstract class Unit extends SingleValueObject
{
    protected $carbon;

    public static function getNowDateTime()
    {
        return new \DateTime('now');
    }

    public function __construct($value)
    {
        $this->carbon = new Carbon;
        parent::__construct($value);
    }
}
