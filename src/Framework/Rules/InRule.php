<?php

declare(strict_types=1);

namespace Framework\Rules;

use Framework\Contracts\RuleInterface;
use InvalidArgumentException;

class InRule implements RuleInterface
{
    public function validate(array $data, string $field, array $params): bool
    {
        if (empty($params)) {
            throw new InvalidArgumentException('No valid options provided.');
        }

        return in_array($data[$field], $params);
    }

    public function getMessage(array $data, string $field, array $params): string
    {
        return "Invalid selection.";
    }
}
