<?php namespace BestServedCold\PhalueObjects\Access;

use BestServedCold\PhalueObjects\Utility\Native\Constant;
use BestServedCold\PhalueObjects\ValueObject;

final class Curl extends ValueObject
{
    public $connectTimeout  = CURLOPT_CONNECTTIMEOUT;
    public $followRedirects = CURLOPT_FOLLOWLOCATION;
    public $headers         = CURLOPT_HEADER;
    public $maxRedirects    = CURLOPT_MAXREDIRS;
    public $noBody          = CURLOPT_NOBODY;
    public $returnTransfer  = CURLOPT_RETURNTRANSFER;
    public $timeout         = CURLOPT_TIMEOUT;

    private $options = [];
    private $constants;

    public function __construct($value)
    {
        parent::__construct($value);
//        $this->constants = new Constant();
        $this->init()
            ->setOption($this->headers)
            ->setOption($this->timeout)
            ->setOption($this->connectTimeout);
    }

    public function exec()
    {
        return curl_exec($this->getValue());
    }

    private function init()
    {
        if (! $this->value = curl_init($this->getValue())) {
            throw new \Exception;
        }

        return $this;
    }

    public function getOptions()
    {
        return $this->options;
    }

    public function getOption($option)
    {
        return isset($this->options[$option]) ? $this->options[$option] : null;
    }

    /**
     * @param $option
     * @param bool|true $value
     * @return $this
     */
    public function setOption($option, $value = true)
    {
        if (curl_setopt($this->getValue(), $option, $value)) {
            $this->options[Constant::init()->curl($option)] = $value;
        }

        return $this;
    }

    public function errorNumber()
    {
        return curl_errno($this->getValue());
    }

    public function error()
    {
        return curl_error($this->getValue());
    }

    public function info()
    {
        return curl_getinfo($this->getValue());
    }

    public function __destruct()
    {
        curl_close($this->value);
    }
}
