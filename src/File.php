<?php namespace BestServedCold\PhalueObjects;

class File extends ValueObject
{
    /**
     * @return bool
     */
    public function exists()
    {
        if ($this->isUrl()) {
            return $this->isReachableUrl();
        } else {
            return file_exists($this->getValue());
        }
    }

    public function isUrl()
    {
        return filter_var($this->getValue(), FILTER_VALIDATE_URL);
    }

    /**
     * Refactor this, it's terrible.
     *
     * @param bool|true $followRedirects
     * @return bool|mixed
     */
    public function isReachableUrl($followRedirects = true)
    {
        if (! $ch = curl_init($this->getValue())) {
            return false;
        }
        curl_setopt($ch, CURLOPT_HEADER, true);    // we want headers
        curl_setopt($ch, CURLOPT_NOBODY, true);    // don't need body
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);    // catch output (do NOT print!)

        if ($followRedirects) {
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
        } else {
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
        }

        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_exec($ch);
        if (curl_errno($ch)) {   // should be 0
            curl_close($ch);
            return false;
        }

        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        @curl_close($ch);

        return $code;
    }

    /**
     * @return string
     */
    public function getContents()
    {
        return $this->exists() ? file_get_contents($this->getValue()) : false;
    }

    /**
     * @return string
     */
    public function getExtension()
    {
        return pathinfo($this->getValue(), PATHINFO_EXTENSION);
    }

    /**
     * @return string
     */
    public function getDirectoryName()
    {
        return pathinfo($this->getValue(), PATHINFO_DIRNAME);
    }

    /**
     * @return string
     */
    public function getFileName()
    {
        return pathinfo($this->getValue(), PATHINFO_FILENAME);
    }

    /**
     * @param string $string
     */
    public static function fromString($string)
    {
        return new static($string);
    }

    public static function fromUrl($url)
    {
        return self::fromString($url);
    }
}
