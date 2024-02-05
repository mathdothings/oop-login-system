<?php
function basePath(string $path = ''): string
{
    define('BASE_PATH', dirname(__DIR__ . '/../', 2));
    return BASE_PATH . $path;
}
