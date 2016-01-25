<?php namespace BestServedCold\PhalueObjects\File;

use BestServedCold\PhalueObjects\File;
use BestServedCold\PhalueObjects\Access\Curl;

final class Http extends File
{
    public function exists()
    {
        if (! $this->valid()) {
            throw new \Exception;
        }

        $curl = Curl::fromString($this->getValue());
        $curl->setOption($curl->noBody)
            ->setOption($curl->returnTransfer)
            ->setOption($curl->followRedirects)
            ->setOption($curl->maxRedirects)
            ->exec();
        return $curl->error() ? false : true;
    }

    public function valid()
    {
        return filter_var($this->getValue(), FILTER_VALIDATE_URL) === false
            ? false
            : true;
    }
}
