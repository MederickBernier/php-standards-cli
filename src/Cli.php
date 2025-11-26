<?php

declare(strict_types=1);

namespace Mederick\PhpStd;

use Mederick\PhpStd\Command\InitCommand;

use function PHPSTORM_META\map;

final class Cli{
    /**
     * @param string[] $argv
     */
    public static function run(array $argv):void{
        // Remove script name
        array_shift($argv);

        $command = $argv[0] ?? null;

        if($command === null || $command === '-h' || $command === '--help'){
            self::printHelp();
            return;
        }

        // Remove command
        array_shift($argv);
        switch($command){
            case 'init':
                $options = self::parseOptions($argv);
                (new InitCommand())->handle($options);
                break;
            default:
            fwrite(STDERR, "Unknown command: {$command}\n");
            self::printHelp();
            exit(1);
        }
    }

    /**
     * @param string[] $args
     * @return array{
     *    mode: string|null,
     *    '--no-editorconfig': bool,
     *    '--no-stan':bool,
     *    '--no-csfixer':bool
     * }
     */
    private static function parseOptions(array $args){
        $options = [
            'mode' => null,
            'no-editorconfig' => false,
            'no-stan' => false,
            'no-csfixer' => false,
        ];

        foreach($args as $arg){
            if(str_starts_with($arg, '--mode=')){
                $options['mode'] = substr($arg, strlen('--mode='));
                continue;
            }

            if($arg === '--no-editorconfig'){
                $options['no-editorconfig'] = true;
                continue;
            }

            if($arg === '--no-stan'){
                $options['no-stan'] = true;
                continue;
            }

            if($arg === '--no-csfixer'){
                $options['no-csfixer'] = true;
                continue;
            }
        }

        if($options['mode'] === null){
            fwrite(STDERR, "Error: --mode=basic|normal|strict is require.\n\n");
            self::printHelp();
            exit(1);
        }

        if(!in_array($options['mode'], ['basic', 'normal', 'strict'], true)){
            fwrite(STDERR, "Error: --mode must be 'basic', 'normal' or 'strict'. \n\n");
            exit(1);
        }
        return $options;
    }

        private static function printHelp(): void
    {
        echo <<<HELP
        php-std <command> [options]

        Commands:
        init                 Generate standard config files for a PHP project.

        Usage:
        php-std init --mode=basic
        php-std init --mode=normal
        php-std init --mode=strict [--no-stan] [--no-csfixer] [--no-editorconfig]

        Options:
        --mode=basic         Gentle defaults for legacy/unknown codebases.
        --mode=normal        Standard strictness.
        --mode=strict        Aggressive strictness for clean/new code.
        --no-editorconfig    Skip .editorconfig generation.
        --no-stan            Skip phpstan.neon generation.
        --no-csfixer         Skip php-cs-fixer.php generation.
        -h, --help           Show this help.

        HELP;
    }
}