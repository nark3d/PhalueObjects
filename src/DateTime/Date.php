<?php namespace PhalueObjects\Date;

use PhalueObjects\AbstractObject;
use PhalueObjects\DateTime\Day;
use PhalueObjects\DateTime\Month;
use PhalueObjects\DateTime\Year;

class Date extends AbstractObject
{
    protected $year;
    protected $month;
    protected $day;

    public function __construct2(Year $year, Month $month, Day $day)
    {

    }
}
