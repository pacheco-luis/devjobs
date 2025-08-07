<?php

declare(strict_types=1);

namespace Framework\Rules\File;

use Framework\Contracts\RuleInterface;

class NameRule implements RuleInterface
{
    public function validate(array $data, string $field, array $params): bool
    {
        return (bool) preg_match('/^[A-Za-z0-9\s._-]+$/', $data[$field]['name']);
    }

    public function getMessage(array $data, string $field, array $params): string
    {
        return "Invalid filename.";
    }
}
