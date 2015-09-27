<?php

$finder = Symfony\CS\Finder\DefaultFinder::create()
    ->notName('.gitignore')
    ->notName('.scrutinizer.yml')
    ->notName('.travix.xml')
    ->notName('composer.*')
    ->notName('LICENSE')
    ->notName('phpdoc.xml')
    ->notName('phpunit.xml')
    ->notName('README.md')
    ->exclude('coverage')
    ->exclude('documents')
    ->exclude('vendor')
    ->in(__DIR__)
;

return Symfony\CS\Config\Config::create()
    ->fixers(['-yoda_conditions'])
    ->finder($finder)
;