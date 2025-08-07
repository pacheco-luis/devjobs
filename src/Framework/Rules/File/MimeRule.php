<?php

declare(strict_types=1);

namespace Framework\Rules\File;

use Framework\Contracts\RuleInterface;
use InvalidArgumentException;

class MimeRule implements RuleInterface
{
    public function validate(array $data, string $field, array $params): bool
    {
        if (empty($params)) {
            throw new InvalidArgumentException('MIME types must be specified.');
        }

        return in_array($data[$field]['type'], $params);
    }

    public function getMessage(array $data, string $field, array $params): string
    {
        return "Invalid file type.";
    }
}
