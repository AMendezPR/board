<?php
// config.php

function loadEnv(string $path): void
{
    if (!is_readable($path)) {
        throw new RuntimeException(".env file not found or not readable at: $path");
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        $line = trim($line);

        // Skip comments and invalid lines
        if ($line === '' || str_starts_with($line, '#') || !str_contains($line, '=')) {
            continue;
        }

        [$key, $value] = explode('=', $line, 2);
        $key   = trim($key);
        $value = trim($value);

        // Remove surrounding quotes
        $value = trim($value, "\"'");

        $_ENV[$key] = $value;
        $_SERVER[$key] = $value;
        putenv("$key=$value");
    }
}

loadEnv(__DIR__ . '/.env');

// Helper to read variables safely
function env(string $key, $default = null)
{
    return $_ENV[$key] ?? getenv($key) ?: $default;
}

// Constants for convenience
define('SUPABASE_URL', env('SUPABASE_URL'));
define('SUPABASE_ANON_KEY', env('SUPABASE_ANON_KEY'));
define('SUPABASE_SERVICE_ROLE_KEY', env('SUPABASE_SERVICE_ROLE_KEY'));