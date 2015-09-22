<?php namespace BestServedCold\PhalueObjects\Pattern;

abstract class Singleton
{
    protected static $instance;

    public function __clone()
    {
        throw new \RuntimeException('You cannot clone a Singleton class');
    }

    public function __construct()
    {
        throw new \RuntimeException('You cannot construct a Singleton class');
    }

    public function __wakeup()
    {
        throw new \RuntimeException('You cannot wake up a Singleon class');
    }

    final public static function singleton()
    {
        static $instances = [];

        $classCalled = get_called_class();

        if (! isset($instances[$classCalled])) {
            $instances[$classCalled] = new $classCalled();
        }

        return $instances[$classCalled];
    }
}
