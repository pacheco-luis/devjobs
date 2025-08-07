<?php

declare(strict_types=1);

namespace Framework\Rules;

use Framework\Contracts\RuleInterface;
use InvalidArgumentException;

class MatchRule implements RuleInterface
{
    public function validate(array $data, string $field, array $params): bool
    {
        if (empty($params[0])) {
            throw new InvalidArgumentException('Field to match against not specified.');
        }

        if (!array_key_exists($params[0], $data)) {
            throw new InvalidArgumentException("Field to match against '{$params[0]}' not found.");
        }

        $fieldOne = $data[$field];
        $fieldTwo = $data[$params[0]];

        return $fieldOne === $fieldTwo;
    }

    public function getMessage(array $data, string $field, array $params): string
    {
        return "Does not match {$params[0]} field.";
    }
}
