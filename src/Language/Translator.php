<?php namespace BestServedCold\PhalueObjects\Language;

use Symfony\Component\Translation\Loader\YamlFileLoader;
use Symfony\Component\Translation\MessageSelector;
use Symfony\Component\Translation\Translator as SymfonyTranslator;

final class Translator
{
    private $translator;

    public function construct()
    {
        $this->translator = new SymfonyTranslator($locale, new MessageSelector());
        $this->translator->addLoader('yaml', new YamlFileLoader());
//        $this->add
    }
}