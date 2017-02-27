<?php

namespace BestServedCold\PhalueObjects\Utility;

use BestServedCold\PhalueObjects\TestCase;

class BenchMarkTest extends TestCase
{
    public function testStart()
    {
        BenchMark::start('bob');
        require_once('./tests/Utility/SomeClass.php');
        require_once('./tests/Utility/SomeInterface.php');
        require_once('./tests/Utility/SomeTrait.php');
        require_once('./tests/Utility/SomeFunction.php');

        define('SOME_CONSTANT', true);
        BenchMark::stop('bob');

//        echo Benchmark::human('bob');
    }
}
