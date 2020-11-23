<?php

$rootDirectory = sprintf('%s/../../..', __DIR__);
$contextDirectory = sprintf('%s/src/CustomerRelation', $rootDirectory);

$finder = PhpCsFixer\Finder::create()
    ->in($contextDirectory)
;

return PhpCsFixer\Config::create()
    ->setRules([
        '@Symfony' => true,
        'array_syntax' => ['syntax' => 'short'],
    ])
    ->setCacheFile(sprintf('%s/var/php_cs.cache', $rootDirectory))
    ->setFinder($finder)
;
