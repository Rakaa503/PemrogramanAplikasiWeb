<?php

declare(strict_types=1);

define('ROOT_PATH', __DIR__);

/**
 * Load environment variables from .env.
 */
function loadEnv(string $file): void
{
    if (!is_file($file) || !is_readable($file)) {
        return;
    }

    $lines = file(
        $file,
        FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES
    );

    if ($lines === false) {
        return;
    }

    foreach ($lines as $line) {
        $line = trim($line);

        if (
            $line === ''
            || str_starts_with($line, '#')
            || !str_contains($line, '=')
        ) {
            continue;
        }

        [$name, $value] = array_map(
            'trim',
            explode('=', $line, 2)
        );

        $value = trim($value, "\"'");

        $_ENV[$name] = $value;
        putenv("{$name}={$value}");
    }
}

loadEnv(ROOT_PATH . DIRECTORY_SEPARATOR . '.env');

/**
 * Read environment variables.
 */
function env(string $key, mixed $default = null): mixed
{
    $value = $_ENV[$key] ?? getenv($key);

    if ($value === false || $value === null || $value === '') {
        return $default;
    }

    return $value;
}

/**
 * Application configuration.
 */
define('APP_NAME', env('APP_NAME', 'Inventory System'));
define('APP_ENV', env('APP_ENV', 'development'));

define(
    'APP_DEBUG',
    filter_var(
        env('APP_DEBUG', false),
        FILTER_VALIDATE_BOOLEAN
    )
);

define(
    'BASEURL',
    rtrim(env('BASE_URL', 'http://localhost:8000'), '/')
);

date_default_timezone_set(
    env('APP_TIMEZONE', 'Asia/Jakarta')
);

/**
 * Database configuration.
 */
define('DB_HOST', env('DB_HOST', '127.0.0.1'));
define('DB_PORT', env('DB_PORT', '3306'));
define('DB_USER', env('DB_USER', 'root'));
define('DB_PASS', env('DB_PASS', ''));
define('DB_NAME', env('DB_NAME', 'inventaris'));
