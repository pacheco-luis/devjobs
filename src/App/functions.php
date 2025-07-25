<?php

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
    http_response_code(302);
    exit;
}
