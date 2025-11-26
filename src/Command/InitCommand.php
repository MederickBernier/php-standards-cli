<?php

declare(strict_types=1);

namespace Mederick\PhpStd\Command;

use Mederick\PhpStd\Service\TemplateWriter;

final class InitCommand{
    /**
     * @param array{
     *  mode: string,
     *  'no-editorconfig': bool,
     *  'no-stan': bool,
     *  'no-csfixer': bool
     * } $options
     */
    public function handle(array $options):void{
        $mode = $options['mode'];
        $writer = new TemplateWriter(
            templateDir: __DIR__.'/../../templates',
            targetDir: getcwd(),
        );

        // .editorconfig
        if(!$options['no-editorconfig']){
            $writer->write('.editorconfig', 'editorconfig.tpl');
        }

        // phpstan.neon
        if(!$options['no-stan']){
            $stanTemplate = match($mode){
                'basic' => 'phpstan.basic.neon.tpl',
                'normal' => 'phpstan.normal.neon.tpl',
                'strict' => 'phpstan.strict.neon.tpl',
                default => 'phpstan.normal.neon.tpl'
            };
            $writer->write('phpstan.neon', $stanTemplate);
        }

        // php-cs-fixer.php
        if(!$options['no-csfixer']){
            $fixerTemplate = match($mode){
                'basic'  => 'php-cs-fixer.basic.php.tpl',
                'normal' => 'php-cs-fixer.normal.php.tpl',
                'strict' => 'php-cs-fixer.strict.php.tpl',
                default  => 'php-cs-fixer.normal.php.tpl',
            };
            $writer->write('php-cs-fixer.php', $fixerTemplate);
        }
    }
}