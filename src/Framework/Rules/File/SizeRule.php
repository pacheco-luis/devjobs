<?php

declare(strict_types=1);

namespace Framework\Rules\File;

use Framework\Contracts\RuleInterface;
use InvalidArgumentException;

class SizeRule implements RuleInterface
{
    public function validate(array $data, string $field, array $params): bool
    {
        if (empty($params[0]) || !is_numeric($params[0])) {
            throw new InvalidArgumentException('Max file size (in KB) must be specified as a numeric value.');
        }

        $maxFileSizeKB = $data[$field]['size'] / 1024;

        return $maxFileSizeKB <= $params[0];
    }

    public function getMessage(array $data, string $field, array $params): string
    {
        return "File upload is too large.";
    }
}
