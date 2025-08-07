<?php

declare(strict_types=1);

namespace Framework\Rules\File;

use Framework\Contracts\RuleInterface;

class UploadedRule implements RuleInterface
{
    public function validate(array $data, string $field, array $params): bool
    {
        return $data[$field]['error'] === UPLOAD_ERR_OK;
    }

    public function getMessage(array $data, string $field, array $params): string
    {
        return "Failed to upload file.";
    }
}
