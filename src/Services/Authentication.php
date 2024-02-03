<?php

namespace Helpers;

use \Model\UserModelInterface;
use \Services\DatabaseInterface;

class Authentication
{
    private UserModelInterface $UserModel;
    private DatabaseInterface $Database;
    private function __construct(UserModelInterface $userModel, DatabaseInterface $database)
    {
        $this->UserModel = $userModel;
        $this->Database = $database;
    }

    function authorize(bool $status = false): bool
    {
        return $status;
    }
}
