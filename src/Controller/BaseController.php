<?php

namespace Controller;

use \Services\DatabaseInterface;

class BaseController
{
    protected DatabaseInterface $Database;
    function __construct(DatabaseInterface $database)
    {
        $this->Database = $database;
    }
    function redirect(string $page, $code = 303): void
    {
        http_response_code($code);
        header("location: $page");
        die;
    }
}
