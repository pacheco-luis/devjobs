<?php

declare(strict_types=1);

use Framework\Http;

function inspect(mixed $value): void
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
}

function inspectAndDie(mixed $value): never
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

function escape(mixed $value): string
{
    return htmlspecialchars((string) $value);
}

function redirectTo(string $path): never
{
    header("Location: " . $path);
    http_response_code(Http::REDIRECT_STATUS_CODE);
    exit;
}
