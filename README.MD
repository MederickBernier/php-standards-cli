# php-standards-cli (`php-std`)

Small PHP CLI to drop your preferred standards config files into any PHP project.

Generates:

- `.editorconfig`
- `phpstan.neon`
- `php-cs-fixer.php`

With three strictness modes:

- `basic`  – for unknown / legacy codebases
- `normal` – day-to-day strictness
- `strict` – for new/refactored / high-discipline areas

## Install

### Local (per-project)

```bash
composer require --dev mederick/php-standards-cli
```

Then:

```bash
vendor/bin/php-std init --mode=normal
```

### Global (once published)

```bash
composer global require mederick/php-standards-cli
```

Make sure `~/.composer/vendor/bin` (or equivalent) is in your `PATH`, then:

```bash
php-std init --mode=strict
```

## Usage

```bash
php-std init --mode=basic|normal|strict [--no-stan] [--no-csfixer] [--no-editorconfig]
```

Examples:

```bash
# Legacy / unknown project, generate everything
php-std init --mode=basic

# Day-to-day config, no PHPStan yet
php-std init --mode=normal --no-stan

# Strict ruleset, only PHPStan & CS-Fixer
php-std init --mode=strict --no-editorconfig
```

### Options

- `--mode=basic`  – gentle defaults for legacy/unknown codebases.
- `--mode=normal` – standard strictness.
- `--mode=strict` – aggressive strictness for clean/new code.
- `--no-editorconfig` – skip `.editorconfig` generation.
- `--no-stan`         – skip `phpstan.neon` generation.
- `--no-csfixer`      – skip `php-cs-fixer.php` generation.

### Existing files (v0.1 behavior)

If a target file already exists:

- `[skip] file.ext already exists.` is printed
- File is **not** modified.

Future versions may add:

- overwrite / `.bak` modes
- `php-std mode --mode=strict`
- presets (`--preset=laravel`, `--preset=symfony`)
- `--dry-run`

## License

MIT
