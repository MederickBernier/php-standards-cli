<?php

declare(strict_types=1);

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$finder = Finder::create()
    ->in([
        __DIR__ . '/src',
        __DIR__ . '/app',
    ])
    ->name('*.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

return (new Config())
    ->setRiskyAllowed(false)
    ->setFinder($finder)
    ->setRules([
        '@PSR12' => true,

        'array_syntax' => ['syntax' => 'short'],
        'single_quote' => true,
        'no_trailing_whitespace' => true,
        'no_unused_imports' => true,

        // Avoid aggressive stuff in basic mode.
        'ordered_imports' => false,
        'native_function_invocation' => false,
        'phpdoc_order' => false,
    ]);
