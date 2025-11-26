<?php

declare(strict_types=1);

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$finder = Finder::create()
    ->in([
        __DIR__ . '/src',
        __DIR__ . '/app',
        __DIR__ . '/tests',
    ])
    ->name('*.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

return (new Config())
    ->setRiskyAllowed(true)
    ->setFinder($finder)
    ->setRules([
        '@PSR12' => true,
        '@PHP80Migration' => true,
        '@PHP80Migration:risky' => true,

        'array_syntax' => ['syntax' => 'short'],
        'binary_operator_spaces' => [
            'operators' => [
                '='  => 'align_single_space_minimal',
                '=>' => 'align_single_space_minimal',
            ],
        ],
        'blank_line_before_statement' => [
            'statements' => ['return', 'throw', 'try', 'if', 'for', 'foreach', 'while'],
        ],
        'no_unused_imports' => true,
        'no_trailing_whitespace' => true,
        'no_extra_blank_lines' => [
            'tokens' => ['extra', 'use', 'return', 'throw'],
        ],
        'single_import_per_statement' => true,
        'single_quote' => true,
        'concat_space' => ['spacing' => 'one'],
        'declare_strict_types' => true,

        'ordered_imports' => [
            'sort_algorithm' => 'alpha',
        ],
        'strict_param' => true,
        'native_function_invocation' => [
            'include' => ['@all'],
            'scope'   => 'namespaced',
            'strict'  => true,
        ],
        'no_superfluous_phpdoc_tags' => [
            'allow_mixed' => false,
        ],
        'phpdoc_align' => [
            'align' => 'vertical',
            'tags' => ['param', 'return', 'throws', 'var'],
        ],
        'phpdoc_order' => true,
        'phpdoc_no_empty_return' => true,
    ]);
