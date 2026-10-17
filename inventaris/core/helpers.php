<?php
declare(strict_types=1);

function e(mixed $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function url(string $path = ''): string
{
    return rtrim(BASEURL, '/') . ($path !== '' ? '/' . ltrim($path, '/') : '');
}

function old(string $key, mixed $default = ''): string
{
    return e($_POST[$key] ?? $default);
}