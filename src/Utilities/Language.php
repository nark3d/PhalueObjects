<?php namespace BestServedCold\PhalueObjects;

use Symfony\Component\Translation\Translator;

class Language
{
    public function __construct()
    {
        $translator = new Translator(Config::get('language.locale'));

    }
}