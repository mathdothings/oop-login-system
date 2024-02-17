<?php
const ROOT_PATH = __DIR__ . '/../';
define(
    'VIEWS_PATH',
    "{$_SERVER['REQUEST_SCHEME']}" . '://' .
        "{$_SERVER['SERVER_NAME']}" . dirname("{$_SERVER['REQUEST_URI']}")
);