<?php

require_once __DIR__ . '/../../config.php';

function basePath($path = ""): string
{
    return ROOT_PATH . $path;
}

function prettyPrint(array $array): int
{
    return print "<pre>" . print_r($array, true) . "</pre>";
}
