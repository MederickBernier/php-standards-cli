<?php

declare(strict_types=1);

namespace Mederick\PhpStd\Service;

final class TemplateWriter
{
    public function __construct(
        private readonly string $templateDir,
        private readonly string $targetDir,
    ) {
    }

    public function write(string $targetFile, string $templateFile): void
    {
        $templatePath = $this->templateDir . '/' . $templateFile;
        $targetPath   = $this->targetDir . '/' . $targetFile;

        if (!file_exists($templatePath)) {
            fwrite(STDERR, "[error] Template not found: {$templatePath}\n");
            return;
        }

        if (file_exists($targetPath)) {
            echo "[skip] {$targetFile} already exists.\n";
            return;
        }

        $contents = file_get_contents($templatePath);

        if ($contents === false) {
            fwrite(STDERR, "[error] Failed to read template: {$templatePath}\n");
            return;
        }

        if (file_put_contents($targetPath, $contents) === false) {
            fwrite(STDERR, "[error] Failed to write file: {$targetPath}\n");
            return;
        }

        echo "[ok]   {$targetFile} created.\n";
    }
}
